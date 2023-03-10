<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{

    protected $table = 'materi';

    protected $fillable = [
        'id_webiner',
        'nama_materi',
        'id_webiner',
        'file_materi',
        'deskripsi_materi',
        'created_at',
    ];
}
