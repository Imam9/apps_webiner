<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{

    protected $table = 'institusi';

    protected $fillable = [
        'nama_institusi',
        'email_institusi',
        'tgl_berdiri',
        'phone_number_institusi',
        'id_users',
        'created_at'
    ];
}
