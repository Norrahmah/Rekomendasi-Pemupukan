<?php
namespace App\Http\Controllers;

use App\Models\JenisPupukPanen;
use Illuminate\Http\Request;

class JenisPupukPanenController extends Controller
{
    public function index()
    {
        $jenisPupukPanens = JenisPupukPanen::all();
        return view('jenis-pupuk-panen.index', compact('jenisPupukPanens'));
    }

    public function create()
    {
        return view('jenis-pupuk-panen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pupuk' => 'required',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $lastCode = JenisPupukPanen::orderBy('id', 'desc')->value('kode_pupuk');
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

        JenisPupukPanen::create($data);

        return redirect()->route('jenis-pupuk-panen.index')
            ->with('message', 'Data Jenis Pupuk Panen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenisPupukPanen = JenisPupukPanen::findOrFail($id);
        return view('jenis-pupuk-panen.edit', compact('jenisPupukPanen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pupuk' => 'required',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $jenisPupukPanen = JenisPupukPanen::findOrFail($id);

        $data = [
            'nama_pupuk' => $request->nama_pupuk,
            'keterangan' => $request->keterangan,
        ];

        if ($request->hasFile('gambar')) {
            if ($jenisPupukPanen->gambar) {
                @unlink(public_path('/files/' . $jenisPupukPanen->gambar));
            }
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $name);
            $data['gambar'] = $name;
        }

        $jenisPupukPanen->update($data);

        return redirect()->route('jenis-pupuk-panen.index')
            ->with('message', 'Data Jenis Pupuk Panen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenisPupukPanen = JenisPupukPanen::findOrFail($id);
        if ($jenisPupukPanen->gambar) {
            @unlink(public_path('/files/' . $jenisPupukPanen->gambar));
        }
        $jenisPupukPanen->delete();

        return redirect()->route('jenis-pupuk-panen.index')
            ->with('message', 'Data Jenis Pupuk Panen berhasil dihapus.');
    }

    public function cetakLaporan()
{
    $jenisPupukPanens = JenisPupukPanen::all();

    return view('jenis-pupuk-panen.cetak_laporan', compact('jenisPupukPanens'));
}

}
