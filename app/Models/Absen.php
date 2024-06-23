<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absen';

    protected $fillable = [
        'nip', 'tgl_masuk', 'jam_absen_manual', 'jenis_kehadiran', 'status_kehadiran',
    ];

    public $timestamps = false;
}
