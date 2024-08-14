<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecommendationPanen;
use App\Models\UsiaCabaiPanen;
use App\Models\PhTanahPanen;
use App\Models\KondisiIklimPanen;
use App\Models\KarakteristikTanamanPanen;
use App\Models\RulesPanen;
use App\Models\Petani; 
use Auth;

class RekomendasiPanenController extends Controller
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

        $usiaCabai = UsiaCabaiPanen::all();
        $phTanah = PhTanahPanen::all();
        $kondisiIklim = KondisiIklimPanen::all();
        $karakteristikTanaman = KarakteristikTanamanPanen::all();

        return view('rekomendasi_panen.create', compact('usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usia_cabai_id' => 'required|exists:usia_cabai_panen,id',
            'ph_tanah_id' => 'required|exists:ph_tanah_panen,id',
            'kondisi_iklim_id' => 'required|exists:kondisi_iklim_panen,id',
            'karakteristik_tanaman_id' => 'required|exists:karakteristik_tanaman_panen,id',
        ]);

        $rules = RulesPanen::all();
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
            $recommendation = RecommendationPanen::create([
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

            return redirect()->route('rekomendasi-panen.show', $recommendation->id)
                ->with('message', 'Rekomendasi berhasil disimpan.');
        }

        return redirect()->route('rekomendasi-panen.create')
            ->with('error', 'Tidak ditemukan aturan yang sesuai.');
    }

    public function show($id)
    {
        $recommendation = RecommendationPanen::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])->findOrFail($id);
        $matchDetails = json_decode($recommendation->match_details, true);

        return view('rekomendasi_panen.show', compact('recommendation', 'matchDetails'));
    }
    public function cetak($id)
    {
        $recommendation = RecommendationPanen::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])->findOrFail($id);
        $matchDetails = json_decode($recommendation->match_details, true);

        return view('rekomendasi_panen.cetak', compact('recommendation', 'matchDetails'));
    }

    public function indexAdmin()
    {
        $recommendations = RecommendationPanen::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule', 'petani'])->get();
        $petanis = Petani::all(); // Mengambil semua data petani

        return view('rekomendasi_panen.admin_index', compact('recommendations', 'petanis'));
    }

    public function destroy($id)
    {
        $recommendation = RecommendationPanen::findOrFail($id);
        $recommendation->delete();

        return redirect()->route('rekomendasi-panen-admin')
            ->with('message', 'Rekomendasi berhasil dihapus.');
    }

    public function riwayatPetani()
    {
        $petani_id = Auth::user()->petani_id;
        $recommendations = RecommendationPanen::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])
            ->where('petani_id', $petani_id)->get();

        return view('rekomendasi_panen.riwayat_petani', compact('recommendations'));
    }

    public function riwayat()
    {
        $recommendations = RecommendationPanen::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])
            ->where('petani_id', Auth::user()->petani_id)
            ->get();

        return view('rekomendasi_panen.riwayat_petani', compact('recommendations'));
    }

    public function lihatHasil($id)
    {
        $recommendation = RecommendationPanen::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule'])
            ->where('petani_id', Auth::user()->petani_id)
            ->findOrFail($id);

        $matchDetails = json_decode($recommendation->match_details, true);

        return view('rekomendasi_panen.show', compact('recommendation', 'matchDetails'));
    }

    public function cetakLaporan(Request $request)
    {
        $tgl_mulai = $request->input('tgl_mulai');
        $tgl_selesai = $request->input('tgl_selesai');
        $petani_id = $request->input('petani_id');

        $query = RecommendationPanen::with(['usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman', 'rule', 'petani'])
            ->whereBetween('tgl_input', [$tgl_mulai, $tgl_selesai]);

        if ($petani_id) {
            $query->where('petani_id', $petani_id);
        }

        $recommendations = $query->get();

        return view('rekomendasi_panen.cetak_laporan', compact('recommendations', 'tgl_mulai', 'tgl_selesai'));
    }
}