<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perorangan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'perorangan';

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
