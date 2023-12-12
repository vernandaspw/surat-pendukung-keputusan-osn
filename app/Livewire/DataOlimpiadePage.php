<?php

namespace App\Livewire;

use App\Models\Osn;
use App\Models\OsnPeserta;
use Livewire\Component;

class DataOlimpiadePage extends Component
{
    public function render()
    {
        $data = Osn::latest();

        if ($this->editID) {
            $this->data_osn = Osn::find($this->editID);
            $peserta = OsnPeserta::where('osn_id', $this->editID)->latest();
            if ($this->lulus == true) {
                $peserta->where('status_lulus', true);
            }
            $this->data_pesertas = $peserta->get();
        }

        $this->datas = $data->get();
        return view('livewire.data-olimpiade-page');
    }

    public $datas = [];
    public $data_osn = [];
    public $data_pesertas = [];

    public $createPage = false;
    public $createPesertaPage = false;

    public $nama;
    public $keterangan;
    public $tgl_buka;
    public $tgl_tutup;
    public $tgl_pengumuman;
    public $bobot_matematika;
    public $bobot_fisika;
    public $bobot_kimia;
    public $bobot_biologi;
    public $peserta_lulus;
    public $isaktif = true;

    public function buat()
    {
        $osn = new Osn();
        $osn->nama = $this->nama;
        $osn->keterangan = $this->keterangan;
        $osn->tgl_buka = $this->tgl_buka;
        $osn->tgl_tutup = $this->tgl_tutup;
        $osn->tgl_pengumuman = $this->tgl_pengumuman;
        $osn->bobot_matematika = $this->bobot_matematika;
        $osn->bobot_fisika = $this->bobot_fisika;
        $osn->bobot_kimia = $this->bobot_kimia;
        $osn->bobot_biologi = $this->bobot_biologi;
        $osn->peserta_lulus = $this->peserta_lulus;
        $osn->isaktif = $this->isaktif;
        $osn->save();

        $this->createPage = false;
        $this->dispatch('success', pesan: 'berhasil tambah osn');
    }

    public $editID;

    public function editPage($id)
    {
        $this->editID = $id;
        $d = Osn::find($id);
        $this->nama = $d->nama;
        $this->keterangan = $d->keterangan;
        $this->tgl_buka = $d->tgl_buka;
        $this->tgl_tutup = $d->tgl_tutup;
        $this->tgl_pengumuman = $d->tgl_pengumuman;
        $this->bobot_matematika = $d->bobot_matematika;
        $this->bobot_fisika = $d->bobot_fisika;
        $this->bobot_kimia = $d->bobot_kimia;
        $this->bobot_biologi = $d->bobot_biologi;
        $this->peserta_lulus = $d->peserta_lulus;
        $this->isaktif = $d->isaktif;
    }

    public function resetInput()
    {
        $this->nama = null;
        $this->keterangan = null;
        $this->tgl_buka = null;
        $this->tgl_tutup = null;
        $this->tgl_pengumuman = null;
        $this->bobot_matematika = null;
        $this->bobot_fisika = null;
        $this->bobot_kimia = null;
        $this->bobot_biologi = null;
        $this->peserta_lulus = null;
    }

    public function simpanEdit()
    {
        $osn = Osn::find($this->editID);
        $osn->nama = $this->nama;
        $osn->keterangan = $this->keterangan;
        $osn->tgl_buka = $this->tgl_buka;
        $osn->tgl_tutup = $this->tgl_tutup;
        $osn->tgl_pengumuman = $this->tgl_pengumuman;
        $osn->bobot_matematika = $this->bobot_matematika;
        $osn->bobot_fisika = $this->bobot_fisika;
        $osn->bobot_kimia = $this->bobot_kimia;
        $osn->bobot_biologi = $this->bobot_biologi;
        $osn->peserta_lulus = $this->peserta_lulus;
        $osn->isaktif = $this->isaktif;
        $osn->save();

        $this->createPage = false;
        $this->dispatch('success', pesan: 'berhasil tambah osn');
    }

    public function tutupPage()
    {
        $this->resetInput();
        $this->editID = null;
        $this->createPage = false;
    }

    public $tambahPeserta = false;
    public $peserta_id;
    public $lulus = false;

    public function pesertaBaru()
    {

    }

    public function toggleSeleksi($id)
    {
        $op = OsnPeserta::find($id);
        if ($op->status_seleksi == true) {
            $op->status_seleksi = false;
        } else {
            $op->status_seleksi = true;
        }
        $op->save();
    }

    public function toggleLulus($id)
    {
        $op = OsnPeserta::find($id);
        if ($op->status_lulus == true) {
            $op->status_lulus = false;
        } else {
            $op->status_lulus = true;
        }
        $op->save();
    }

    public function generateLulus()
    {
        
    }

}
