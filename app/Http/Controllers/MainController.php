<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use App\Models\Dokumen;
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
        $items = Dokumen::where('type', 'lkk')->get();
        $debitur = Debitur::all();
        return view('pages.lkk', compact('items', 'debitur'));
    }
    
    public function lkd()
    {
        $items = Dokumen::where('type', 'lkd')->get();
        $debitur = Debitur::all();
        return view('pages.lkd', compact('items', 'debitur'));
    }
    
    public function memoDinas()
    {
        $items = Dokumen::where('type', 'memo dinas')->get();
        return view('pages.memo-dinas', compact('items'));
    }

    public function uploadDokumen(Request $request)
    {
        if ($request->type != 'memo dinas') {
            $data = $request->validate([
                'type' => ['required'],
                'id_debitur' => ['required'],
                'no' => ['required', 'string', 'max:255'],
            ]);
        } else {
            $data = $request->validate([
                'type' => ['required'],
                'no' => ['required', 'string', 'max:255'],
            ]);
        }
        
        $data['path'] = $request->file('path')->storeAs('files/dokumen/'.$request->type, $request->no.'.pdf' , 'public');

        Dokumen::create($data);
        return redirect()->back()->with('success', 'Dokumen berhasil diunggah!');
    }

    public function hapusDokumen(string $id)
    {
        $item = Dokumen::find($id);
        $title = $item->no;
        $item->delete();

        return redirect()->back()->with('success', $title.' dihapus!');
    }
}
