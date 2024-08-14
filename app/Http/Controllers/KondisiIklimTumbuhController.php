<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KondisiIklimTumbuh;

class KondisiIklimTumbuhController extends Controller
{
    public function index()
    {
        $kondisiIklimTumbuhs = KondisiIklimTumbuh::all();
        return view('kondisiiklimtumbuh.index', compact('kondisiIklimTumbuhs'));
    }

    public function create()
    {
        return view('kondisiiklimtumbuh.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kondisi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $lastCode = KondisiIklimTumbuh::orderBy('id', 'desc')->value('kode_iklim');
        $kodeIklim = $lastCode ? ++$lastCode : 'KI1';

        $kondisiIklimTumbuh = KondisiIklimTumbuh::create([
            'kode_iklim' => $kodeIklim,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kondisi-iklim-tumbuh.index')->with('message', 'Data kondisi iklim tumbuh berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kondisiIklimTumbuh = KondisiIklimTumbuh::findOrFail($id);
        return view('kondisiiklimtumbuh.show', compact('kondisiIklimTumbuh'));
    }

    public function edit($id)
    {
        $kondisiIklimTumbuh = KondisiIklimTumbuh::findOrFail($id);
        return view('kondisiiklimtumbuh.edit', compact('kondisiIklimTumbuh'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kondisi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $kondisiIklimTumbuh = KondisiIklimTumbuh::findOrFail($id);
        $kondisiIklimTumbuh->update([
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kondisi-iklim-tumbuh.index')->with('message', 'Data kondisi iklim tumbuh berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kondisiIklimTumbuh = KondisiIklimTumbuh::findOrFail($id);
        $kondisiIklimTumbuh->delete();

        return redirect()->route('kondisi-iklim-tumbuh.index')->with('message', 'Data kondisi iklim tumbuh berhasil dihapus.');
    }
}
