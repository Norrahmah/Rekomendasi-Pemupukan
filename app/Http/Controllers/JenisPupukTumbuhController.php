<?php
namespace App\Http\Controllers;

use App\Models\JenisPupukTumbuh;
use Illuminate\Http\Request;

class JenisPupukTumbuhController extends Controller
{
    public function index()
    {
        $jenisPupukTumbuhs = JenisPupukTumbuh::all();
        return view('jenis-pupuk-tumbuh.index', compact('jenisPupukTumbuhs'));
    }

    public function create()
    {
        return view('jenis-pupuk-tumbuh.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pupuk' => 'required',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $lastCode = JenisPupukTumbuh::orderBy('id', 'desc')->value('kode_pupuk');
        $kodePupuk = $lastCode ? ++$lastCode : 'JP1';

        $data = [
            'kode_pupuk' => $kodePupuk,
            'nama_pupuk' => $request->nama_pupuk,
            'keterangan' => $request->keterangan,
        ];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $name);
            $data['gambar'] = $name;
        }

        JenisPupukTumbuh::create($data);

        return redirect()->route('jenis-pupuk-tumbuh.index')
            ->with('message', 'Data Jenis Pupuk Tumbuh berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenisPupukTumbuh = JenisPupukTumbuh::findOrFail($id);
        return view('jenis-pupuk-tumbuh.edit', compact('jenisPupukTumbuh'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pupuk' => 'required',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $jenisPupukTumbuh = JenisPupukTumbuh::findOrFail($id);

        $data = [
            'nama_pupuk' => $request->nama_pupuk,
            'keterangan' => $request->keterangan,
        ];

        if ($request->hasFile('gambar')) {
            if ($jenisPupukTumbuh->gambar) {
                @unlink(public_path('/files/' . $jenisPupukTumbuh->gambar));
            }
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $name);
            $data['gambar'] = $name;
        }

        $jenisPupukTumbuh->update($data);

        return redirect()->route('jenis-pupuk-tumbuh.index')
            ->with('message', 'Data Jenis Pupuk Tumbuh berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenisPupukTumbuh = JenisPupukTumbuh::findOrFail($id);
        if ($jenisPupukTumbuh->gambar) {
            @unlink(public_path('/files/' . $jenisPupukTumbuh->gambar));
        }
        $jenisPupukTumbuh->delete();

        return redirect()->route('jenis-pupuk-tumbuh.index')
            ->with('message', 'Data Jenis Pupuk Tumbuh berhasil dihapus.');
    }
    public function cetakLaporan()
{
    $jenisPupukTumbuhs = JenisPupukTumbuh::all();

    return view('jenis-pupuk-tumbuh.cetak_laporan', compact('jenisPupukTumbuhs'));
}

}
