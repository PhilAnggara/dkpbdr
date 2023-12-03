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
        $debKorporasi = Debitur::where('type', 'korporasi')->get();
        $debPerorangan = Debitur::where('type', 'perorangan')->get();
        return view('pages.debitur', compact('items', 'fintech', 'debKorporasi', 'debPerorangan'));
    }

    public function create()
    {
        //
    }

    public function store(DebiturRequest $request)
    {
        $data = $request->all();
        if ($request->type == 'korporasi') {
            $fileFields = [
                'npwp', 
                'akta_pendirian', 
                'akta_pengesahan', 
                'akta_perubahan_terakhir', 
                'akta_pengesahan2', 
                'siup', 
                'nib', 
                'ktp_1', 
                'npwp_1', 
                'ktp_2', 
                'npwp_2', 
                'ktp_3', 
                'npwp_3', 
                'ktp_4', 
                'npwp_4', 
                'ktp_5', 
                'npwp_5'
            ];
        } else {
            $fileFields = ['ktp', 'npwp'];
        }
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store($request->type, 'public');
            }
        }
        $item = Debitur::create($data);

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
            $korporasi = new Korporasi($data);
            $item->korporasi()->save($korporasi);
        } else {
            $perorangan = new Perorangan($data);
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
        $data = $request->all();
        if ($request->type == 'korporasi') {
            $fileFields = [
                'npwp', 
                'akta_pendirian', 
                'akta_pengesahan', 
                'akta_perubahan_terakhir', 
                'akta_pengesahan2', 
                'siup', 
                'nib', 
                'ktp_1', 
                'npwp_1', 
                'ktp_2', 
                'npwp_2', 
                'ktp_3', 
                'npwp_3', 
                'ktp_4', 
                'npwp_4', 
                'ktp_5', 
                'npwp_5'
            ];
        } else {
            $fileFields = ['ktp', 'npwp'];
        }
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store($request->type, 'public');
            }
        }
        $item = Debitur::find($id);
        $item->update($data);

        if ($item->type == 'korporasi') {
            $item->korporasi->update($data);
        } else {
            $item->perorangan->update($data);
        }

        return redirect()->back()->with('success', $request->nama.' berhasil diubah!');
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
