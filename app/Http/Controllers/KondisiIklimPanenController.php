<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KondisiIklimPanen;

class KondisiIklimPanenController extends Controller
{
    public function index()
    {
        $kondisiIklimPanens = KondisiIklimPanen::all();
        return view('kondisiiklimpanen.index', compact('kondisiIklimPanens'));
    }

    public function create()
    {
        return view('kondisiiklimpanen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kondisi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $lastCode = KondisiIklimPanen::orderBy('id', 'desc')->value('kode_iklim');
        $kodeIklim = $lastCode ? ++$lastCode : 'KI1';

        $kondisiIklimPanen = KondisiIklimPanen::create([
            'kode_iklim' => $kodeIklim,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kondisi-iklim-panen.index')->with('message', 'Data kondisi iklim panen berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kondisiIklimPanen = KondisiIklimPanen::findOrFail($id);
        return view('kondisiiklimpanen.show', compact('kondisiIklimPanen'));
    }

    public function edit($id)
    {
        $kondisiIklimPanen = KondisiIklimPanen::findOrFail($id);
        return view('kondisiiklimpanen.edit', compact('kondisiIklimPanen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kondisi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $kondisiIklimPanen = KondisiIklimPanen::findOrFail($id);
        $kondisiIklimPanen->update([
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kondisi-iklim-panen.index')->with('message', 'Data kondisi iklim panen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kondisiIklimPanen = KondisiIklimPanen::findOrFail($id);
        $kondisiIklimPanen->delete();

        return redirect()->route('kondisi-iklim-panen.index')->with('message', 'Data kondisi iklim panen berhasil dihapus.');
    }
}
