<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use App\Models\Dokumen;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::whereMonth('tanggal', Carbon::now()->month)->get()->sortByDesc('tanggal');
        return view('pages.beranda', [
            'pembayaran' => $pembayaran
        ]);
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
        $items = Pembayaran::all()->sortByDesc('tanggal');
        return view('pages.jatuh', [
            'items' => $items
        ]);
    }
    
    public function lkk()
    {
        $items = Dokumen::where('type', 'lkk')->get()->sortDesc();
        $debitur = Debitur::all()->sortDesc();
        return view('pages.lkk', compact('items', 'debitur'));
    }
    
    public function lkd()
    {
        $items = Dokumen::where('type', 'lkd')->get()->sortDesc();
        $debitur = Debitur::all()->sortDesc();
        return view('pages.lkd', compact('items', 'debitur'));
    }
    
    public function memoDinas()
    {
        $items = Dokumen::where('type', 'memo dinas')->get()->sortDesc();
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
        
        $data['path'] = $request->file('path')->storeAs('dokumen/'.$request->type, $request->no.'.pdf' , 'public');

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
