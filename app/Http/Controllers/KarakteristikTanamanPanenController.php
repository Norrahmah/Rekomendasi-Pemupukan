<?php

namespace App\Http\Controllers;

use App\Models\KarakteristikTanamanPanen;
use Illuminate\Http\Request;

class KarakteristikTanamanPanenController extends Controller
{
    public function index()
    {
        $karakteristikTanamanPanens = KarakteristikTanamanPanen::all();
        return view('karakteristik-tanaman-panen.index', compact('karakteristikTanamanPanens'));
    }

    public function create()
    {
        return view('karakteristik-tanaman-panen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'karakteristik' => 'required|string',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $lastCode = KarakteristikTanamanPanen::orderBy('id', 'desc')->value('kode_tanaman');
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

        KarakteristikTanamanPanen::create($data);

        return redirect()->route('karakteristik-tanaman-panen.index')
            ->with('message', 'Data Karakteristik Tanaman Panen berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Show method can be implemented if you need to display a specific resource
    }

    public function edit($id)
    {
        $karakteristikTanamanPanen = KarakteristikTanamanPanen::findOrFail($id);
        return view('karakteristik-tanaman-panen.edit', compact('karakteristikTanamanPanen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karakteristik' => 'required|string',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $karakteristikTanamanPanen = KarakteristikTanamanPanen::findOrFail($id);

        $data = $request->only(['karakteristik', 'keterangan']);

        if ($request->hasFile('gambar')) {
            // Delete the old image if exists
            if ($karakteristikTanamanPanen->gambar) {
                $oldImagePath = public_path('/files/' . $karakteristikTanamanPanen->gambar);
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

        $karakteristikTanamanPanen->update($data);

        return redirect()->route('karakteristik-tanaman-panen.index')
            ->with('message', 'Data Karakteristik Tanaman Panen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $karakteristikTanamanPanen = KarakteristikTanamanPanen::findOrFail($id);

        if ($karakteristikTanamanPanen->gambar) {
            $imagePath = public_path('/files/' . $karakteristikTanamanPanen->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $karakteristikTanamanPanen->delete();

        return redirect()->route('karakteristik-tanaman-panen.index')
            ->with('message', 'Data Karakteristik Tanaman Panen berhasil dihapus.');
    }

    public function cetakLaporan()
    {
        $karakteristikTanamanPanens = KarakteristikTanamanPanen::all();
    
        return view('karakteristik-tanaman-panen.cetak_laporan', compact('karakteristikTanamanPanens'));
    }
}
