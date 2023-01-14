<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailSertifikat extends Model
{

    protected $table = 'detail_sertifikat';

    protected $fillable = [
        'top_title',
        'top_nama',
        'top_body',
        'top_title_ttd',
        'top_nama_ttd',
        'padding_left',
        'padding_right',
        'id_sertifikat',
        'nama_ttd',
        'gambar_ttd',
        'no_sertifikat',
        'updated_at',
        'created_at'
    ];
}
