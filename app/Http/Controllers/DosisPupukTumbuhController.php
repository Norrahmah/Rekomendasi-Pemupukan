<?php

namespace App\Http\Controllers;

use App\Models\DosisPupukTumbuh;
use App\Models\JenisPupukTumbuh;
use Illuminate\Http\Request;

class DosisPupukTumbuhController extends Controller
{
    public function index()
    {
        $dosisPupukTumbuhs = DosisPupukTumbuh::all();
        return view('dosis-pupuk-tumbuh.index', compact('dosisPupukTumbuhs'));
    }

    public function create()
    {
        $jenisPupuks = JenisPupukTumbuh::all();

        return view('dosis-pupuk-tumbuh.create', compact('jenisPupuks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pupuk_id' => 'required|exists:jenis_pupuk_tumbuh,id',
            'dosis' => 'required',
            'satuan' => 'required',
            'pelarutan' => 'nullable|string',
            'cara_pakai' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'pemupukan_ulang' => 'nullable|string',
        ]);

        $lastCode = DosisPupukTumbuh::orderBy('id', 'desc')->value('kode_dosis');
        $kodeDosis = $lastCode ? ++$lastCode : 'DP1';

        DosisPupukTumbuh::create([
            'kode_dosis' => $kodeDosis,
            'jenis_pupuk_id' => $request->jenis_pupuk_id,
            'dosis' => $request->dosis,
            'satuan' => $request->satuan,
            'pelarutan' => $request->pelarutan,
            'cara_pakai' => $request->cara_pakai,
            'keterangan' => $request->keterangan,
            'pemupukan_ulang' => $request->pemupukan_ulang,
        ]);

        return redirect()->route('dosis-pupuk-tumbuh.index')
            ->with('message', 'Data Dosis Pupuk Tumbuh berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dosisPupukTumbuh = DosisPupukTumbuh::findOrFail($id);
        $jenisPupuks = JenisPupukTumbuh::all();
        return view('dosis-pupuk-tumbuh.edit', compact('dosisPupukTumbuh', 'jenisPupuks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_pupuk_id' => 'required|exists:jenis_pupuk_tumbuh,id',
            'dosis' => 'required',
            'satuan' => 'required',
            'pelarutan' => 'nullable|string',
            'cara_pakai' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'pemupukan_ulang' => 'nullable|string',
        ]);

        $dosisPupukTumbuh = DosisPupukTumbuh::findOrFail($id);
        $dosisPupukTumbuh->update([
            'jenis_pupuk_id' => $request->jenis_pupuk_id,
            'dosis' => $request->dosis,
            'satuan' => $request->satuan,
            'pelarutan' => $request->pelarutan,
            'cara_pakai' => $request->cara_pakai,
            'keterangan' => $request->keterangan,
            'pemupukan_ulang' => $request->pemupukan_ulang,
        ]);

        return redirect()->route('dosis-pupuk-tumbuh.index')
            ->with('message', 'Data Dosis Pupuk Tumbuh berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dosisPupukTumbuh = DosisPupukTumbuh::findOrFail($id);
        $dosisPupukTumbuh->delete();

        return redirect()->route('dosis-pupuk-tumbuh.index')
            ->with('message', 'Data Dosis Pupuk Tumbuh berhasil dihapus.');
    }

    public function cetakLaporan()
    {
        $dosisPupukTumbuhs = DosisPupukTumbuh::with(['jenisPupuk'])->get();
    
        return view('dosis-pupuk-tumbuh.cetak_laporan', compact('dosisPupukTumbuhs'));
    }
    
}
