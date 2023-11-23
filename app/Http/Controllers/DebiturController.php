<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use App\Models\Fintech;
use Illuminate\Http\Request;
use App\Http\Requests\DebiturRequest;

class DebiturController extends Controller
{
    public function index()
    {
        $fintech = Fintech::all();
        $items = Debitur::all()->sortDesc();
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
        $item->delete();

        return redirect()->back()->with('success', $title.' dihapus!');
    }
}
