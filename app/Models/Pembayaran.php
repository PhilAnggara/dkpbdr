<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pembayaran';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [

    ];

    public function debitur()
    {
        return $this->belongsTo(Debitur::class, 'id_debitur', 'id');
    }
}
