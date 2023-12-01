<?php

use Carbon\Carbon;
use App\Models\Debitur;
use App\Models\Kelurahan;
use Illuminate\Support\Str;

if (!function_exists('testHelper')) {
    function testHelper()
    {
        return 'Berhasil';
    }
}

function tgl($date)
{
    return Carbon::parse($date)->isoFormat('D MMMM YYYY');
}

function uang($number)
{
    return 'Rp '. number_format($number, 0, ',', '.');
}

function alamat($id)
{
    $kel = Kelurahan::find($id);
    $kec = $kel->kec;
    $kab = $kec->kab;
    $prov = $kab->prov;
    
    return Str::title($kel->nama. ', Kec. '. $kec->nama. ', '. $kab->nama. ', Prov. '. $prov->nama);
}