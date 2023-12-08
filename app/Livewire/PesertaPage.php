<?php

namespace App\Livewire;

use App\Models\DataPeserta;
use Livewire\Component;

class PesertaPage extends Component
{
    public function render()
    {
        $this->datas = DataPeserta::latest()->get();
        return view('livewire.peserta-page');
    }
    public $datas = [];
    public $ID;
}
