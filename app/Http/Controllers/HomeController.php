<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsiaCabaiTumbuh;
use App\Models\PhTanahTumbuh;
use App\Models\KondisiIklimTumbuh;
use App\Models\KarakteristikTanamanTumbuh;
use App\Models\UsiaCabaiPanen;
use App\Models\PhTanahPanen;
use App\Models\KondisiIklimPanen;
use App\Models\KarakteristikTanamanPanen;

class HomeController extends Controller
{
    public function index()
    {
        $usiaCabai = UsiaCabaiTumbuh::all();
        $phTanah = PhTanahTumbuh::all();
        $kondisiIklim = KondisiIklimTumbuh::all();
        $karakteristikTanaman = KarakteristikTanamanTumbuh::all();
        
        $usiaCabaiPanen = UsiaCabaiPanen::all();
        $phTanahPanen = PhTanahPanen::all();
        $kondisiIklimPanen = KondisiIklimPanen::all();
        $karakteristikTanamanPanen = KarakteristikTanamanPanen::all();

        return view('welcome', compact('usiaCabai', 'phTanah', 'kondisiIklim', 'karakteristikTanaman','usiaCabaiPanen', 'phTanahPanen', 'kondisiIklimPanen', 'karakteristikTanamanPanen'));
    }
}
