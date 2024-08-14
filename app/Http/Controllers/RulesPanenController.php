<?php

namespace App\Http\Controllers;

use App\Models\RulesPanen;
use Illuminate\Http\Request;
use App\Models\UsiaCabaiPanen;
use App\Models\PhTanahPanen;
use App\Models\KondisiIklimPanen;
use App\Models\KarakteristikTanamanPanen;
use App\Models\DosisPupukPanen;

class RulesPanenController extends Controller
{
    public function index()
    {
        $rulesPanens = RulesPanen::all();
        return view('rules-panen.index', compact('rulesPanens'));
    }

    public function create()
    {
        $usiaCabaiPanens = UsiaCabaiPanen::all();
        $phTanahPanens = PhTanahPanen::all();
        $kondisiIklimPanens = KondisiIklimPanen::all();
        $karakteristikTanamanPanens = KarakteristikTanamanPanen::all();
        $dosisPupukPanens = DosisPupukPanen::all();

        return view('rules-panen.create', compact('usiaCabaiPanens', 'phTanahPanens', 'kondisiIklimPanens', 'karakteristikTanamanPanens', 'dosisPupukPanens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usia_cabai_id' => 'required',
            'ph_tanah_id' => 'required',
            'kondisi_iklim_id' => 'required',
            'karakteristik_tanaman_id' => 'required',
            'dosis_pupuk_id' => 'required',
            'keterangan' => 'nullable|string',
        ]);
        $lastCode = RulesPanen::orderBy('id', 'desc')->value('kode_rule');
        $kodeRule = $lastCode ? ++$lastCode : 'R1';
    
        RulesPanen::create([
            'kode_rule' => $kodeRule,
            'usia_cabai_id' => $request->usia_cabai_id,
            'ph_tanah_id' => $request->ph_tanah_id,
            'kondisi_iklim_id' => $request->kondisi_iklim_id,
            'karakteristik_tanaman_id' => $request->karakteristik_tanaman_id,
            'dosis_pupuk_id' => $request->dosis_pupuk_id,
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->route('rules-panen.index')
            ->with('message', 'Data Rules Panen berhasil ditambahkan.');
    }
    
   

    public function edit($id)
    {
        $rulesPanen = RulesPanen::findOrFail($id);
        $usiaCabaiPanens = UsiaCabaiPanen::all();
        $phTanahPanens = PhTanahPanen::all();
        $kondisiIklimPanens = KondisiIklimPanen::all();
        $karakteristikTanamanPanens = KarakteristikTanamanPanen::all();
        $dosisPupukPanens = DosisPupukPanen::all();

        return view('rules-panen.edit', compact('rulesPanen', 'usiaCabaiPanens', 'phTanahPanens', 'kondisiIklimPanens', 'karakteristikTanamanPanens', 'dosisPupukPanens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usia_cabai_id' => 'required',
            'ph_tanah_id' => 'required',
            'kondisi_iklim_id' => 'required',
            'karakteristik_tanaman_id' => 'required',
            'dosis_pupuk_id' => 'required',
            'keterangan' => 'nullable|string',
        ]);
    
        $rulesPanen = RulesPanen::findOrFail($id);
        $rulesPanen->update([
            'usia_cabai_id' => $request->usia_cabai_id,
            'ph_tanah_id' => $request->ph_tanah_id,
            'kondisi_iklim_id' => $request->kondisi_iklim_id,
            'karakteristik_tanaman_id' => $request->karakteristik_tanaman_id,
            'dosis_pupuk_id' => $request->dosis_pupuk_id,
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->route('rules-panen.index')
            ->with('message', 'Data Rules Panen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rulesPanen = RulesPanen::findOrFail($id);
        $rulesPanen->delete();

        return redirect()->route('rules-panen.index')
            ->with('message', 'Data Rules Panen berhasil dihapus.');
    }

    public function cetakLaporan(Request $request)
    {
        $rulesPanens = RulesPanen::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'dosisPupuk.jenisPupuk'])->get();
    
        return view('rules-panen.cetak_laporan', compact('rulesPanens'));
    }
}
