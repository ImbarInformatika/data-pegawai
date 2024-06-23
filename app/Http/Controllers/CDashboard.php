<?php

namespace App\Http\Controllers;

use App\Charts\jumlahAnggota;
use App\Models\MPegawai;
use Illuminate\Http\Request;

class CDashboard extends Controller
{
    public function index(jumlahAnggota $chart)
    {
        $jumlah_pegawai = MPegawai::count();
        $jumlah_pns = MPegawai::where('status_kepegawaian', 'PNS')->count();
        $jumlah_kontrak = MPegawai::where('status_kepegawaian', 'Kontrak')->count();
        $anggota_IKP = MPegawai::where('jabatan', 'Anggota IKP')->count();
        $anggota_TIP = MPegawai::where('jabatan', 'Anggota TIP')->count();
        $anggota_statistik = MPegawai::where('jabatan', 'Anggota Statistik')->count();
        return view('menu.dashboard', compact('jumlah_pegawai', 'jumlah_pns', 'jumlah_kontrak', 'anggota_IKP', 'anggota_TIP', 'anggota_statistik'));
    }
}
