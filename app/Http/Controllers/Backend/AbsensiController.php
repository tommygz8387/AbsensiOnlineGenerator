<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Kode;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // fungsi untuk absen
    public function store(Request $request)
        {
        $idLogin = Auth::id();
        $getIdAsisten = $request -> id_asisten;
        $getKode = $request -> kode;
        $getIdKelas = $request -> kelas;
        $getIdMateri = $request -> materi;
        $getPeran = $request -> peran_jaga;

        // cek id asisten
        $getMatchId = User::where('id',$getIdAsisten)->first();
        if ($idLogin==$getMatchId->id) {
            // cek kode
            $getMatchKode = Kode::where('kode',$getKode)->first();
            if ($getKode==$getMatchKode->kode && (empty($getMatchKode->user_id_get))) {
                // cek kondisi kode absen jika tidak sama dengan kode buatan sendiri
                if ($getMatchKode->user_id!=$idLogin) {
                    $today = Carbon::now("GMT+7")->toDateString();
                    $timeNow = Carbon::now("GMT+7")->toTimeString();

                    $store = Absensi::create([
                        "kelas_id" => $getIdKelas,
                        "materi_id" => $getIdMateri,
                        "asisten_id" => $idLogin,
                        "teaching_role" => $getPeran,
                        "date" => $today,
                        "start" => $timeNow,
                        "kode_id" => $getMatchKode->id
                    ]);
                    if (!$store) {
                        return redirect()->route('home')->with('error','Absen Error');
                    }else{
                        return redirect()->route('home')->with('success','Absen Berhasil');
                    }
                }else {
                    return redirect()->route('home')->with('error','Tidak Boleh Menggunakan Kode Absen Sendiri');
                }
            }else {
                return redirect()->route('home')->with('error','Kode Absen Sudah Terpakai');
            }
        }else {
            return redirect()->route('home')->with('error','Absen Error');
        }
    }

    // fungsi untuk logout
    public function updateAbsen()
    {
        $carbon = Carbon::now("GMT+7");
        $today = $carbon -> toDateString();
        $idLogin = Auth::id();
        $cekAbsen = Absensi::where('asisten_id', Auth::id())->where('date',$today)->where('end',null)->first();

        $start = $cekAbsen->start;
        $out = $carbon -> toTimeString();
        $duration = $carbon -> diffInMinutes($start);
        $cekAbsen->end = $out;
        $cekAbsen->duration = $duration;
        $cekAbsen->save();

        // cek jika berhasil
        if (!$cekAbsen) {
            return redirect()->route('home')->with('error','Clock Out Error');
        } else {
            return redirect()->route('home')->with('success','Clock Out Berhasil');
        }
        
    }

}