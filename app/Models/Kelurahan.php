<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';

    public function kec()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
}
