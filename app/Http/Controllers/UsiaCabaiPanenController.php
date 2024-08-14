<?php

namespace App\Http\Controllers;

use App\Models\UsiaCabaiPanen;
use Illuminate\Http\Request;

class UsiaCabaiPanenController extends Controller
{
    public function index()
    {
        $usiaCabaiPanens = UsiaCabaiPanen::all();
        return view('usiacabaipanen.index', compact('usiaCabaiPanens'));
    }

    public function create()
    {
        return view('usiacabaipanen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'usia' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $lastCode = UsiaCabaiPanen::orderBy('id', 'desc')->value('kode_cabai');
        $kodeCabai = $lastCode ? ++$lastCode : 'UC1';

        $data = $request->only(['usia', 'keterangan']);
        $data['kode_cabai'] = $kodeCabai;

        // if ($request->hasFile('gambar')) {
        //     $image = $request->file('gambar');
        //     $name = time() . '.' . $image->getClientOriginalExtension();
        //     $destinationPath = public_path('/files');
        //     $image->move($destinationPath, $name);
        //     $data['gambar'] = $name;
        // }

        UsiaCabaiPanen::create($data);

        return redirect()->route('usia-cabai-panen.index')->with('message', 'Data usia cabai panen berhasil dibuat.');
    }

    public function show($id)
    {
        $usiaCabaiPanen = UsiaCabaiPanen::findOrFail($id);
        return view('usiacabaipanen.show', compact('usiaCabaiPanen'));
    }

    public function edit($id)
    {
        $usiaCabaiPanen = UsiaCabaiPanen::findOrFail($id);
        return view('usiacabaipanen.edit', compact('usiaCabaiPanen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usia' => 'required|string',
            'keterangan' => 'nullable|string',
            // 'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $usiaCabaiPanen = UsiaCabaiPanen::findOrFail($id);

        $data = $request->only(['usia', 'keterangan']);

        // if ($request->hasFile('gambar')) {
        //     // Delete the old image if exists
        //     if ($usiaCabaiPanen->gambar) {
        //         $oldImagePath = public_path('/files/' . $usiaCabaiPanen->gambar);
        //         if (file_exists($oldImagePath)) {
        //             unlink($oldImagePath);
        //         }
        //     }

        //     $image = $request->file('gambar');
        //     $name = time() . '.' . $image->getClientOriginalExtension();
        //     $destinationPath = public_path('/files');
        //     $image->move($destinationPath, $name);
        //     $data['gambar'] = $name;
        // }

        $usiaCabaiPanen->update($data);

        return redirect()->route('usia-cabai-panen.index')->with('message', 'Data usia cabai panen berhasil diupdate.');
    }

    public function destroy($id)
    {
        $usiaCabaiPanen = UsiaCabaiPanen::findOrFail($id);

        // if ($usiaCabaiPanen->gambar) {
        //     $imagePath = public_path('/files/' . $usiaCabaiPanen->gambar);
        //     if (file_exists($imagePath)) {
        //         unlink($imagePath);
        //     }
        // }

        $usiaCabaiPanen->delete();

        return redirect()->route('usia-cabai-panen.index')->with('message', 'Data usia cabai panen berhasil dihapus.');
    }
}
