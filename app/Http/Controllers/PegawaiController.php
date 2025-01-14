<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function getNip()
    {
        // Ambil data NIP dari database
        $nips = Pegawai::pluck('nip');
        return view('absen', compact('nips'));
    }
}
