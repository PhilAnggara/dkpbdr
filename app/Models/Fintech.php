<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fintech extends Model
{
    use HasFactory;

    protected $table = 'fintech';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [

    ];

    public function debitur()
    {
        return $this->hasMany(Debitur::class, 'id_fintech', 'id');
    }
}
