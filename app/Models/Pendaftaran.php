<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{

    protected $table = 'pendaftaran';

    protected $fillable = [
        'id_pendaftaran',
        'id_users',
        'id_webiner',
        'tgl_absensi',
        'created_at',
    ];
}
