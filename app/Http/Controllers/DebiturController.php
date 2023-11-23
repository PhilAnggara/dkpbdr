<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use App\Models\Fintech;
use Illuminate\Http\Request;
use App\Http\Requests\DebiturRequest;
use App\Models\Korporasi;
use App\Models\Pembayaran;
use App\Models\Perorangan;
use Carbon\Carbon;

class DebiturController extends Controller
{
    public function index()
    {
        $fintech = Fintech::all();
        $items = Debitur::all();
        return view('pages.debitur', compact('items', 'fintech'));
    }

    public function create()
    {
        //
    }

    public function store(DebiturRequest $request)
    {
        // dd($request->all());
        $item = Debitur::create($request->all());

        if ($item->sistem_pembayaran == 'Balloon Payment') {
            for ($i=1; $i <= $item->jangka_waktu; $i++) {
                if ($i == $item->jangka_waktu) {
                    $type = 'jatuh tempo';
                } else {
                    $type = 'jatuh tagih';
                }
                Pembayaran::create([
                    'id_debitur' => $item->id,
                    'type' => $type,
                    'tanggal' => Carbon::parse($item->tanggal_cair)->addMonth($i)
                ]);
            }
        } else {
            Pembayaran::create([
                'id_debitur' => $item->id,
                'type' => 'jatuh tempo',
                'tanggal' => Carbon::parse($item->tanggal_cair)->addMonth($item->jangka_waktu)
            ]);
        }

        if ($item->type == 'korporasi') {
            $korporasi = new Korporasi($request->all());
            $item->korporasi()->save($korporasi);
        } else {
            $perorangan = new Perorangan($request->all());
            $item->perorangan()->save($perorangan);
        }
        

        return redirect()->back()->with('success', $request->nama.' berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(DebiturRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $item = Debitur::find($id);
        $title = $item->nama;
        $item->korporasi()->delete();
        $item->perorangan()->delete();
        $item->pembayaran()->delete();
        $item->dokumen()->delete();
        $item->delete();

        return redirect()->back()->with('success', $title.' dihapus!');
    }
}
