<?php

// app/Http/Controllers/PhTanahTumbuhController.php

namespace App\Http\Controllers;

use App\Models\PhTanahTumbuh;
use Illuminate\Http\Request;

class PhTanahTumbuhController extends Controller
{
    public function index()
    {
        $phTanahTumbuhs = PhTanahTumbuh::all();
        return view('ph-tanah-tumbuh.index', compact('phTanahTumbuhs'));
    }

    public function create()
    {
        return view('ph-tanah-tumbuh.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ph_level' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        $lastCode = PhTanahTumbuh::orderBy('id', 'desc')->value('kode_ph');

        $kodePh = $lastCode ? ++$lastCode : 'PH1'; 

        $phTanahTumbuh = PhTanahTumbuh::create([
            'kode_ph' => $kodePh,
            'ph_level' => $request->ph_level,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('ph-tanah-tumbuh.index')
            ->with('message', 'Data PH Tanah Tumbuh berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Show method can be implemented if you need to display a specific resource
    }

    public function edit($id)
    {
        $phTanahTumbuh = PhTanahTumbuh::findOrFail($id);
        return view('ph-tanah-tumbuh.edit', compact('phTanahTumbuh'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ph_level' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        $phTanahTumbuh = PhTanahTumbuh::findOrFail($id);
        $phTanahTumbuh->update([
            'ph_level' => $request->ph_level,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('ph-tanah-tumbuh.index')
            ->with('message', 'Data PH Tanah Tumbuh berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $phTanahTumbuh = PhTanahTumbuh::findOrFail($id);
        $phTanahTumbuh->delete();

        return redirect()->route('ph-tanah-tumbuh.index')
            ->with('message', 'Data PH Tanah Tumbuh berhasil dihapus.');
    }
}
