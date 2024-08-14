<?php

// app/Http/Controllers/PhTanahPanenController.php

namespace App\Http\Controllers;

use App\Models\PhTanahPanen;
use Illuminate\Http\Request;

class PhTanahPanenController extends Controller
{
    public function index()
    {
        $phTanahPanens = PhTanahPanen::all();
        return view('ph-tanah-panen.index', compact('phTanahPanens'));
    }

    public function create()
    {
        return view('ph-tanah-panen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ph_level' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        $lastCode = PhTanahPanen::orderBy('id', 'desc')->value('kode_ph');

        $kodePh = $lastCode ? ++$lastCode : 'PH1'; 

        $phTanahPanen = PhTanahPanen::create([
            'kode_ph' => $kodePh,
            'ph_level' => $request->ph_level,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('ph-tanah-panen.index')
            ->with('message', 'Data PH Tanah Panen berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Show method can be implemented if you need to display a specific resource
    }

    public function edit($id)
    {
        $phTanahPanen = PhTanahPanen::findOrFail($id);
        return view('ph-tanah-panen.edit', compact('phTanahPanen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ph_level' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        $phTanahPanen = PhTanahPanen::findOrFail($id);
        $phTanahPanen->update([
            'ph_level' => $request->ph_level,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('ph-tanah-panen.index')
            ->with('message', 'Data PH Tanah Panen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $phTanahPanen = PhTanahPanen::findOrFail($id);
        $phTanahPanen->delete();

        return redirect()->route('ph-tanah-panen.index')
            ->with('message', 'Data PH Tanah Panen berhasil dihapus.');
    }
}
