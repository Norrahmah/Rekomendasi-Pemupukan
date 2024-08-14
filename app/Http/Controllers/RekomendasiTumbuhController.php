<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecommendationTumbuh;
use App\Models\UsiaCabaiTumbuh;
use App\Models\PhTanahTumbuh;
use App\Models\KondisiIklimTumbuh;
use App\Models\KarakteristikTanamanTumbuh;
use App\Models\RulesTumbuh;
use App\Models\Petani; 
use Auth;

class RekomendasiTumbuhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'indexAdmin', 'destroy']);
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->level !== 'petani') {
            return redirect()->route('login')->with('error', 'Anda harus login sebagai petani terlebih dahulu.');
        }

        $usiaCabai = UsiaCabaiTumbuh::all();
        $phTanah = PhTanahTumbuh::all();
        $kondisiIklim = KondisiIklimTumbuh::all();
        $karakteristikTanaman = KarakteristikTanamanTumbuh::all();

        return view('rekomendasi_tumbuh.create', compact('usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usia_cabai_id' => 'required|exists:usia_cabai_tumbuh,id',
            'ph_tanah_id' => 'required|exists:ph_tanah_tumbuh,id',
            'kondisi_iklim_id' => 'required|exists:kondisi_iklim_tumbuh,id',
            'karakteristik_tanaman_id' => 'required|exists:karakteristik_tanaman_tumbuh,id',
        ]);

        $rules = RulesTumbuh::all();
        $bestRule = null;
        $maxScore = 0;
        $matchDetails = [];

        foreach ($rules as $rule) {
            $score = 0;
            $details = [];

            if ($rule->usia_cabai_id == $request->usia_cabai_id) {
                $score++;
                $details[] = "Usia Cabai matches";
            }
            if ($rule->ph_tanah_id == $request->ph_tanah_id) {
                $score++;
                $details[] = "pH Tanah matches";
            }
            if ($rule->kondisi_iklim_id == $request->kondisi_iklim_id) {
                $score++;
                $details[] = "Kondisi Iklim matches";
            }
            if ($rule->karakteristik_tanaman_id == $request->karakteristik_tanaman_id) {
                $score++;
                $details[] = "Karakteristik Tanaman matches";
            }

            if ($score > $maxScore) {
                $maxScore = $score;
                $bestRule = $rule;
                $matchDetails = $details;
            }
        }

        if ($bestRule) {
            $recommendation = RecommendationTumbuh::create([
                'usia_cabai_id' => $request->usia_cabai_id,
                'ph_tanah_id' => $request->ph_tanah_id,
                'kondisi_iklim_id' => $request->kondisi_iklim_id,
                'karakteristik_tanaman_id' => $request->karakteristik_tanaman_id,
                'rules_id' => $bestRule->id,
                'tgl_input' => now(),
                'match_score' => $maxScore,
                'match_details' => json_encode($matchDetails),
                'petani_id' => Auth::user()->petani_id,
            ]);

            return redirect()->route('rekomendasi-tumbuh.show', $recommendation->id)
                ->with('message', 'Rekomendasi berhasil disimpan.');
        }

        return redirect()->route('rekomendasi-tumbuh.create')
            ->with('error', 'Tidak ditemukan aturan yang sesuai.');
    }

    public function show($id)
    {
        $recommendation = RecommendationTumbuh::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])->findOrFail($id);
        $matchDetails = json_decode($recommendation->match_details, true);

        return view('rekomendasi_tumbuh.show', compact('recommendation', 'matchDetails'));
    }
    public function cetak($id)
    {
        $recommendation = RecommendationTumbuh::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])->findOrFail($id);
        $matchDetails = json_decode($recommendation->match_details, true);

        return view('rekomendasi_tumbuh.cetak', compact('recommendation', 'matchDetails'));
    }

    public function indexAdmin()
    {
        $recommendations = RecommendationTumbuh::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule', 'petani'])->get();
        $petanis = Petani::all(); // Mengambil semua data petani

        return view('rekomendasi_tumbuh.admin_index', compact('recommendations', 'petanis'));
    }

    public function destroy($id)
    {
        $recommendation = RecommendationTumbuh::findOrFail($id);
        $recommendation->delete();

        return redirect()->route('rekomendasi-tumbuh-admin')
            ->with('message', 'Rekomendasi berhasil dihapus.');
    }

    public function riwayatPetani()
    {
        $petani_id = Auth::user()->petani_id;
        $recommendations = RecommendationTumbuh::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])
            ->where('petani_id', $petani_id)->get();

        return view('rekomendasi_tumbuh.riwayat_petani', compact('recommendations'));
    }

    public function riwayat()
    {
        $recommendations = RecommendationTumbuh::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])
            ->where('petani_id', Auth::user()->petani_id)
            ->get();

        return view('rekomendasi_tumbuh.riwayat_petani', compact('recommendations'));
    }

    public function lihatHasil($id)
    {
        $recommendation = RecommendationTumbuh::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])
            ->where('petani_id', Auth::id())
            ->findOrFail($id);

        $matchDetails = json_decode($recommendation->match_details, true);

        return view('rekomendasi_tumbuh.show', compact('recommendation', 'matchDetails'));
    }

    public function cetakLaporan(Request $request)
    {
        $tgl_mulai = $request->input('tgl_mulai');
        $tgl_selesai = $request->input('tgl_selesai');
        $petani_id = $request->input('petani_id');

        $query = RecommendationTumbuh::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule', 'petani'])
            ->whereBetween('tgl_input', [$tgl_mulai, $tgl_selesai]);

        if ($petani_id) {
            $query->where('petani_id', $petani_id);
        }

        $recommendations = $query->get();

        return view('rekomendasi_tumbuh.cetak_laporan', compact('recommendations', 'tgl_mulai', 'tgl_selesai'));
    }
}