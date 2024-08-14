<?php

namespace App\Http\Controllers;

use App\Models\RulesTumbuh;
use Illuminate\Http\Request;
use App\Models\UsiaCabaiTumbuh;
use App\Models\PhTanahTumbuh;
use App\Models\KondisiIklimTumbuh;
use App\Models\KarakteristikTanamanTumbuh;
use App\Models\DosisPupukTumbuh;

class RulesTumbuhController extends Controller
{
    public function index()
    {
        $rulesTumbuhs = RulesTumbuh::all();
        return view('rules-tumbuh.index', compact('rulesTumbuhs'));
    }

    public function create()
    {
        $usiaCabaiTumbuhs = UsiaCabaiTumbuh::all();
        $phTanahTumbuhs = PhTanahTumbuh::all();
        $kondisiIklimTumbuhs = KondisiIklimTumbuh::all();
        $karakteristikTanamanTumbuhs = KarakteristikTanamanTumbuh::all();
        $dosisPupukTumbuhs = DosisPupukTumbuh::all();

        return view('rules-tumbuh.create', compact('usiaCabaiTumbuhs', 'phTanahTumbuhs', 'kondisiIklimTumbuhs', 'karakteristikTanamanTumbuhs', 'dosisPupukTumbuhs'));
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
        $lastCode = RulesTumbuh::orderBy('id', 'desc')->value('kode_rule');
        $kodeRule = $lastCode ? ++$lastCode : 'R1';
    
        RulesTumbuh::create([
            'kode_rule' => $kodeRule,
            'usia_cabai_id' => $request->usia_cabai_id,
            'ph_tanah_id' => $request->ph_tanah_id,
            'kondisi_iklim_id' => $request->kondisi_iklim_id,
            'karakteristik_tanaman_id' => $request->karakteristik_tanaman_id,
            'dosis_pupuk_id' => $request->dosis_pupuk_id,
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->route('rules-tumbuh.index')
            ->with('message', 'Data Rules Tumbuh berhasil ditambahkan.');
    }
    
   

    public function edit($id)
    {
        $rulesTumbuh = RulesTumbuh::findOrFail($id);
        $usiaCabaiTumbuhs = UsiaCabaiTumbuh::all();
        $phTanahTumbuhs = PhTanahTumbuh::all();
        $kondisiIklimTumbuhs = KondisiIklimTumbuh::all();
        $karakteristikTanamanTumbuhs = KarakteristikTanamanTumbuh::all();
        $dosisPupukTumbuhs = DosisPupukTumbuh::all();

        return view('rules-tumbuh.edit', compact('rulesTumbuh', 'usiaCabaiTumbuhs', 'phTanahTumbuhs', 'kondisiIklimTumbuhs', 'karakteristikTanamanTumbuhs', 'dosisPupukTumbuhs'));
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
    
        $rulesTumbuh = RulesTumbuh::findOrFail($id);
        $rulesTumbuh->update([
            'usia_cabai_id' => $request->usia_cabai_id,
            'ph_tanah_id' => $request->ph_tanah_id,
            'kondisi_iklim_id' => $request->kondisi_iklim_id,
            'karakteristik_tanaman_id' => $request->karakteristik_tanaman_id,
            'dosis_pupuk_id' => $request->dosis_pupuk_id,
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->route('rules-tumbuh.index')
            ->with('message', 'Data Rules Tumbuh berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rulesTumbuh = RulesTumbuh::findOrFail($id);
        $rulesTumbuh->delete();

        return redirect()->route('rules-tumbuh.index')
            ->with('message', 'Data Rules Tumbuh berhasil dihapus.');
    }

    public function cetakLaporan(Request $request)
{
    $rulesTumbuhs = RulesTumbuh::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'dosisPupuk.jenisPupuk'])->get();

    return view('rules-tumbuh.cetak_laporan', compact('rulesTumbuhs'));
}

}
