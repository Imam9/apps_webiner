<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webiner extends Model
{

    protected $table = 'webiner';

    protected $fillable = [
        'nama_webiner',
        'tgl_webiner',
        'jam_mulai',
        'jam_selesai',
        'slot_peserta',
        'sisa_slot_peserta',
        'deskripsi_webiner',
        'gambar_webiner',
        'link_webiner',
        'id_kategori',
        'created_at',
        'id_users',
    ];
}
