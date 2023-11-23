<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Debitur extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'debitur';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [

    ];

    public function fin()
    {
        return $this->belongsTo(Fintech::class, 'id_fintech', 'id');
    }

    public function korporasi()
    {
        return $this->hasOne(Korporasi::class, 'id_debitur', 'id');
    }

    public function perorangan()
    {
        return $this->hasOne(Perorangan::class, 'id_debitur', 'id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_debitur', 'id');
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_debitur', 'id');
    }
}
