<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{

    protected $table = 'sertifikat';

    protected $fillable = [
        'id_webiner',
        'nama_sertifikat',
        'gambar_sertifikat',
        'deskripsi_sertifikat',
        'created_at',
    ];
}
