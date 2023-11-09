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
        return view('pages.beranda');
    }
    
    public function peminjam()
    {
        return view('pages.beranda');
    }
    
    public function capaian()
    {
        return view('pages.beranda');
    }
    
    public function lkk()
    {
        return view('pages.beranda');
    }
    
    public function jatuh()
    {
        return view('pages.beranda');
    }
}
