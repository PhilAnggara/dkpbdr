<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.beranda');
    }

    public function inputData()
    {
        return view('pages.input-data');
    }
    
    public function capaian()
    {
        return view('pages.capaian');
    }
    
    public function jatuh()
    {
        return view('pages.jatuh');
    }
    
    public function lkk()
    {
        return view('pages.lkk');
    }
    
    public function lkd()
    {
        return view('pages.lkd');
    }
    
    public function memoDinas()
    {
        return view('pages.memo-dinas');
    }
}
