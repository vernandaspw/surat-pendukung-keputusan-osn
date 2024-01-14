<?php

namespace App\Livewire;

use App\Models\KriteriaNilai;
use Livewire\Component;

class KriteriaBobotPage extends Component
{

    public $rapots = [];
    public $rankings = [];
    public $matematikas = [];
    public $fisikas = [];
    public $biologis = [];
    public $kimias = [];

    public $kriteria;
    public $bobot;
    public $nilai_awal;
    public $nilai_akhir;

    public function render()
    {
        $this->rapots = KriteriaNilai::where('kriteria', 'rapot')->get();
        $this->rankings = KriteriaNilai::where('kriteria', 'ranking')->get();
        $this->matematikas = KriteriaNilai::where('kriteria', 'matematika')->get();
        $this->fisikas = KriteriaNilai::where('kriteria', 'fisika')->get();
        $this->biologis = KriteriaNilai::where('kriteria', 'biologi')->get();
        $this->kimias = KriteriaNilai::where('kriteria', 'kimia')->get();

        return view('livewire.kriteria-bobot-page');
    }

    public $createPage;

    public function resetInput()
    {
        $this->createPage = null;
        $this->bobot = null;
        $this->nilai_awal = null;
        $this->nilai_akhir = null;
        $this->editID = null;
    }

    public function simpan($kriteria)
    {
        $k = new KriteriaNilai();
        $k->kriteria = $kriteria;
        $k->bobot = $this->bobot;
        $k->nilai_awal = $this->nilai_awal;
        $k->nilai_akhir = $this->nilai_akhir;
        $k->save();

        $this->resetInput();
    }

    public function hapus($id)
    {
        $d = KriteriaNilai::find($id);
        $d->delete();
    }

    public $editID;

    public function editPage($id)
    {
        $this->editID = $id;
        $d = KriteriaNilai::find($id);
        $this->bobot = $d->bobot;
        $this->nilai_awal = $d->nilai_awal;
        $this->nilai_akhir = $d->nilai_akhir;
    }
    
    public function edit()
    {
        $d = KriteriaNilai::find($this->editID);
        $d->bobot = $this->bobot;
        $d->nilai_awal = $this->nilai_awal;
        $d->nilai_akhir = $this->nilai_akhir;
        $d->save();
        
        $this->resetInput();
    }
}
