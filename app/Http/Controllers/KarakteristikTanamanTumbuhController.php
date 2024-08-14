<?php

namespace App\Http\Controllers;

use App\Models\KarakteristikTanamanTumbuh;
use Illuminate\Http\Request;

class KarakteristikTanamanTumbuhController extends Controller
{
    public function index()
    {
        $karakteristikTanamanTumbuhs = KarakteristikTanamanTumbuh::all();
        return view('karakteristik-tanaman-tumbuh.index', compact('karakteristikTanamanTumbuhs'));
    }

    public function create()
    {
        return view('karakteristik-tanaman-tumbuh.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'karakteristik' => 'required|string',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $lastCode = KarakteristikTanamanTumbuh::orderBy('id', 'desc')->value('kode_tanaman');
        $kodeTanaman = $lastCode ? ++$lastCode : 'KT1';

        $data = $request->only(['karakteristik', 'keterangan']);
        $data['kode_tanaman'] = $kodeTanaman;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $name);
            $data['gambar'] = $name;
        }

        KarakteristikTanamanTumbuh::create($data);

        return redirect()->route('karakteristik-tanaman-tumbuh.index')
            ->with('message', 'Data Karakteristik Tanaman Tumbuh berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Show method can be implemented if you need to display a specific resource
    }

    public function edit($id)
    {
        $karakteristikTanamanTumbuh = KarakteristikTanamanTumbuh::findOrFail($id);
        return view('karakteristik-tanaman-tumbuh.edit', compact('karakteristikTanamanTumbuh'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karakteristik' => 'required|string',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $karakteristikTanamanTumbuh = KarakteristikTanamanTumbuh::findOrFail($id);

        $data = $request->only(['karakteristik', 'keterangan']);

        if ($request->hasFile('gambar')) {
            // Delete the old image if exists
            if ($karakteristikTanamanTumbuh->gambar) {
                $oldImagePath = public_path('/files/' . $karakteristikTanamanTumbuh->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $name);
            $data['gambar'] = $name;
        }

        $karakteristikTanamanTumbuh->update($data);

        return redirect()->route('karakteristik-tanaman-tumbuh.index')
            ->with('message', 'Data Karakteristik Tanaman Tumbuh berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $karakteristikTanamanTumbuh = KarakteristikTanamanTumbuh::findOrFail($id);

        if ($karakteristikTanamanTumbuh->gambar) {
            $imagePath = public_path('/files/' . $karakteristikTanamanTumbuh->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $karakteristikTanamanTumbuh->delete();

        return redirect()->route('karakteristik-tanaman-tumbuh.index')
            ->with('message', 'Data Karakteristik Tanaman Tumbuh berhasil dihapus.');
    }

    public function cetakLaporan()
{
    $karakteristikTanamanTumbuhs = KarakteristikTanamanTumbuh::all();

    return view('karakteristik-tanaman-tumbuh.cetak_laporan', compact('karakteristikTanamanTumbuhs'));
}

}
