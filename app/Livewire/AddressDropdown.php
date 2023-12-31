<?php

namespace App\Livewire;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use Livewire\Component;

class AddressDropdown extends Component
{
    public $provinsi, $kabupaten, $kecamatan, $kelurahan;
    public $selectedProvinsi = '';
    public $selectedKabupaten = '';
    public $selectedKecamatan = '';
    public $selectedKelurahan = '';
    public $kel;

    public function mount()
    {
        $this->provinsi = Provinsi::all();
        $this->kabupaten = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();

        if ($this->kel) {
            $this->selectedKelurahan = $this->kel->id;
            $this->selectedKecamatan = $this->kel->kec->id;
            $this->selectedKabupaten = $this->kel->kec->kab->id;
            $this->selectedProvinsi = $this->kel->kec->kab->prov->id;
            $this->kabupaten = Kabupaten::where('id_provinsi', $this->selectedProvinsi)->get();
            $this->kecamatan = Kecamatan::where('id_kabupaten', $this->selectedKabupaten)->get();
            $this->kelurahan = Kelurahan::where('id_kecamatan', $this->selectedKecamatan)->get();
        }
    }

    public function render()
    {
        return view('livewire.address-dropdown');
    }

    public function updatedSelectedProvinsi()
    {
        $this->kabupaten = Kabupaten::where('id_provinsi', $this->selectedProvinsi)->get();
        $this->reset('selectedKabupaten', 'selectedKecamatan', 'selectedKelurahan');
    }

    public function updatedSelectedKabupaten()
    {
        $this->kecamatan = Kecamatan::where('id_kabupaten', $this->selectedKabupaten)->get();
        $this->reset('selectedKecamatan', 'selectedKelurahan');
    }

    public function updatedSelectedKecamatan()
    {
        $this->kelurahan = Kelurahan::where('id_kecamatan', $this->selectedKecamatan)->get();
        $this->reset('selectedKelurahan');
    }
}
