<?php

namespace App\Http\Controllers;

use App\Models\DosisPupukPanen;
use App\Models\JenisPupukPanen;
use Illuminate\Http\Request;

class DosisPupukPanenController extends Controller
{
    public function index()
    {
        $dosisPupukPanens = DosisPupukPanen::all();
        return view('dosis-pupuk-panen.index', compact('dosisPupukPanens'));
    }

    public function create()
    {
        $jenisPupuks = JenisPupukPanen::all();

        return view('dosis-pupuk-panen.create', compact('jenisPupuks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pupuk_id' => 'required|exists:jenis_pupuk_panen,id',
            'dosis' => 'required',
            'satuan' => 'required',
            'pelarutan' => 'nullable|string',
            'cara_pakai' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'pemupukan_ulang' => 'nullable|string',
        ]);

        $lastCode = DosisPupukPanen::orderBy('id', 'desc')->value('kode_dosis');
        $kodeDosis = $lastCode ? ++$lastCode : 'DP1';

        DosisPupukPanen::create([
            'kode_dosis' => $kodeDosis,
            'jenis_pupuk_id' => $request->jenis_pupuk_id,
            'dosis' => $request->dosis,
            'satuan' => $request->satuan,
            'pelarutan' => $request->pelarutan,
            'cara_pakai' => $request->cara_pakai,
            'keterangan' => $request->keterangan,
            'pemupukan_ulang' => $request->pemupukan_ulang,
        ]);

        return redirect()->route('dosis-pupuk-panen.index')
            ->with('message', 'Data Dosis Pupuk Panen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dosisPupukPanen = DosisPupukPanen::findOrFail($id);
        $jenisPupuks = JenisPupukPanen::all();
        return view('dosis-pupuk-panen.edit', compact('dosisPupukPanen', 'jenisPupuks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_pupuk_id' => 'required|exists:jenis_pupuk_panen,id',
            'dosis' => 'required',
            'satuan' => 'required',
            'pelarutan' => 'nullable|string',
            'cara_pakai' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'pemupukan_ulang' => 'nullable|string',
        ]);

        $dosisPupukPanen = DosisPupukPanen::findOrFail($id);
        $dosisPupukPanen->update([
            'jenis_pupuk_id' => $request->jenis_pupuk_id,
            'dosis' => $request->dosis,
            'satuan' => $request->satuan,
            'pelarutan' => $request->pelarutan,
            'cara_pakai' => $request->cara_pakai,
            'keterangan' => $request->keterangan,
            'pemupukan_ulang' => $request->pemupukan_ulang,
        ]);

        return redirect()->route('dosis-pupuk-panen.index')
            ->with('message', 'Data Dosis Pupuk Panen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dosisPupukPanen = DosisPupukPanen::findOrFail($id);
        $dosisPupukPanen->delete();

        return redirect()->route('dosis-pupuk-panen.index')
            ->with('message', 'Data Dosis Pupuk Panen berhasil dihapus.');
    }

    public function cetakLaporan()
{
    $dosisPupukPanens = DosisPupukPanen::with(['jenisPupuk'])->get();

    return view('dosis-pupuk-panen.cetak_laporan', compact('dosisPupukPanens'));
}

}
