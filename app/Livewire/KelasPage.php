<?php

namespace App\Livewire;

use App\Models\Kelas;
use App\Models\SubKelas;
use Livewire\Component;

class KelasPage extends Component
{
    public function render()
    {
        $this->kelass = Kelas::get();
        return view('livewire.kelas-page');
    }

    public $kelass = [];

    public $kelas, $subkelas;

    public function tambahKelas()
    {
        $k = new Kelas();
        $k->nama = $this->kelas;
        $k->save();
        $this->kelas = null;
    }

    public $kelas_id;

    public function tambahSubPage($id)
    {
        $this->kelas_id = $id;
        $k = Kelas::find($id);
        $this->kelasname = $k->nama;
    }


    public $nama;
    public $kelasname;
    public function tambahSubKelas()
    {
        $s = new SubKelas();
        $s->kelas_id = $this->kelas_id;
        $s->nama = $this->nama;
        $s->save();
        $this->nama = null;
    }

    public function hapusKelas($id)
    {
        Kelas::find($id)->delete();
    }
    public function hapusSubkelas($id)
    {
        SubKelas::find($id)->delete();
    }

    public function tambahkelaspage()
    {
        $this->kelas_id = null;
        $this->kelasname = null;
        $this->nama = null;
    }
}
