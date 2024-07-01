<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function getNip()
    {
        // Tabel config
        $isJamEnabled = Config::where('label', 'isJamManual')->value('value');

        // Ambil data NIP dari database
        $nips = Pegawai::pluck('nip', 'nama');
        return view('absen', compact('nips', 'isJamEnabled'));
    }
}
