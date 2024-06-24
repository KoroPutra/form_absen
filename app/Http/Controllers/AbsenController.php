<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;

class AbsenController extends Controller
{
    public function index()
    {
        return view('absen');
    }

    function submit(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'tgl_masuk' => 'required|date',
            'jam_absen_manual' => 'required|date_format:H:i',
            'jenis_kehadiran' => 'required',
            'status_kehadiran' => 'required',
        ]);

        $absen = new Absen;
        $absen->nip = $request->nip;
        $absen->tgl_masuk = $request->tgl_masuk;
        $absen->jam_absen_manual = $request->tgl_masuk . ' ' . $request->jam_absen_manual . ':00';
        $absen->jenis_kehadiran = $request->jenis_kehadiran;
        $absen->status_kehadiran = $request->status_kehadiran;
        $absen->save();

        return redirect()->route('succes')->with('success', 'Absen berhasil disimpan.');
    }
}
