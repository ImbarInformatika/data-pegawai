<?php

namespace App\Http\Controllers;

use App\Models\MPegawai;
use Illuminate\Http\Request;

class CLanding extends Controller
{
    public function index()
    {
        $kadis = MPegawai::where('jabatan', 'Kepala Dinas')->first();
        $sekretaris = MPegawai::where('jabatan', 'Sekretaris')->first();
        $kabidikp = MPegawai::where('jabatan', 'Kabid IKP')->first();
        $kabidtip = MPegawai::where('jabatan', 'Kabid TIP')->first();
        $kabidstatistik = MPegawai::where('jabatan', 'Kabid Statistik')->first();
        $anggotaikp = MPegawai::where('jabatan', 'Anggota IKP')->get();
        $anggotatip = MPegawai::where('jabatan', 'Anggota TIP')->get();
        $anggotastatistik = MPegawai::where('jabatan', 'Anggota Statistik')->get();

        return view('landingpage', compact(
            'kadis',
            'sekretaris',
            'kabidikp',
            'kabidtip',
            'kabidstatistik',
            'anggotaikp',
            'anggotatip',
            'anggotastatistik'
        ));
    }
}
