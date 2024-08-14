<?php

namespace App\Http\Controllers;

use App\Models\UsiaCabaiTumbuh;
use Illuminate\Http\Request;

class UsiaCabaiTumbuhController extends Controller
{
    public function index()
    {
        $usiaCabaiTumbuhs = UsiaCabaiTumbuh::all();
        return view('usiacabaitumbuh.index', compact('usiaCabaiTumbuhs'));
    }

    public function create()
    {
        return view('usiacabaitumbuh.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'usia' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $lastCode = UsiaCabaiTumbuh::orderBy('id', 'desc')->value('kode_cabai');
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

        UsiaCabaiTumbuh::create($data);

        return redirect()->route('usia-cabai-tumbuh.index')->with('message', 'Data usia cabai tumbuh berhasil dibuat.');
    }

    public function show($id)
    {
        $usiaCabaiTumbuh = UsiaCabaiTumbuh::findOrFail($id);
        return view('usiacabaitumbuh.show', compact('usiaCabaiTumbuh'));
    }

    public function edit($id)
    {
        $usiaCabaiTumbuh = UsiaCabaiTumbuh::findOrFail($id);
        return view('usiacabaitumbuh.edit', compact('usiaCabaiTumbuh'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usia' => 'required|string',
            'keterangan' => 'nullable|string',
            // 'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $usiaCabaiTumbuh = UsiaCabaiTumbuh::findOrFail($id);

        $data = $request->only(['usia', 'keterangan']);

        // if ($request->hasFile('gambar')) {
        //     // Delete the old image if exists
        //     if ($usiaCabaiTumbuh->gambar) {
        //         $oldImagePath = public_path('/files/' . $usiaCabaiTumbuh->gambar);
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

        $usiaCabaiTumbuh->update($data);

        return redirect()->route('usia-cabai-tumbuh.index')->with('message', 'Data usia cabai tumbuh berhasil diupdate.');
    }

    public function destroy($id)
    {
        $usiaCabaiTumbuh = UsiaCabaiTumbuh::findOrFail($id);

        // if ($usiaCabaiTumbuh->gambar) {
        //     $imagePath = public_path('/files/' . $usiaCabaiTumbuh->gambar);
        //     if (file_exists($imagePath)) {
        //         unlink($imagePath);
        //     }
        // }

        $usiaCabaiTumbuh->delete();

        return redirect()->route('usia-cabai-tumbuh.index')->with('message', 'Data usia cabai tumbuh berhasil dihapus.');
    }
}
