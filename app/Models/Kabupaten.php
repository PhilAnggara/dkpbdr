<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';

    public function prov()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }
    public function kec()
    {
        return $this->hasMany(Kecamatan::class, 'id_kabupaten', 'id');
    }
}
