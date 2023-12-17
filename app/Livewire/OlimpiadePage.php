<?php

namespace App\Livewire;

use App\Models\Osn;
use App\Models\OsnPeserta;
use Livewire\Component;

class OlimpiadePage extends Component
{
    public $status = 2;
    // 1 diikuti
    // 2 sedang berlangsung / sebelum pengumuman
    // 3 setelah pengumuman

    public function render()
    {
        $osn = Osn::query();

        if ($this->status == 2) {
            $osn->where('tgl_pengumuman', '>=', date('Y-m-d'));
        }
        if ($this->status == 3) {
            $osn->where('tgl_pengumuman', '<', date('Y-m-d'));
        }

        if ($this->osn_id) {
            $this->osn = Osn::find($this->osn_id);
            $peserta = OsnPeserta::where('osn_id', $this->osn_id)->latest();
            if ($this->pesertaPage == 2) {
                $peserta->where('status_lulus', true);
            }
            $this->pesertas = $peserta->get();
        }

        $this->osns = $osn->get();
        return view('livewire.olimpiade-page');
    }

    public $pesertaPage = 1;

    public $osns = [];
    public $osn;

    public $osn_id;
    public $daftar_osn = false;

    public $pesertas = [];
    public $peserta_lulus = [];

    public function detailPage($id)
    {
        $this->osn_id = $id;
        $this->osn = Osn::find($id);
        $this->pesertas = OsnPeserta::where('osn_id', $this->osn_id)->latest()->get();
    }

    public function daftarPage()
    {
        $osn = OsnPeserta::where('osn_id', $this->osn_id)->where('user_id', auth()->user()->id)->first();
        if ($osn) {
            return $this->dispatch('error', pesan: 'Sudah pernah daftar');
        }
    }

    public $daftarPage = false;
    public $nilai_rapot;
    public $nilai_matematika;
    public $nilai_fisika;
    public $nilai_kimia;
    public $nilai_biologi;

    public function daftar()
    {
        // cek udah pernah daftar blm
        if (!auth()->check()) {
            return $this->dispatch('error', pesan: 'Anda harus login terlebih dahulu');
        }
        if (auth()->user()->role != 'peserta') {
            return $this->dispatch('error', pesan: 'status akun bukan calon peserta');
        }
        $cek = OsnPeserta::where('osn_id', $this->osn_id)->where('user_id', auth()->user()->id)->first();
        if ($cek) {
            return $this->dispatch('error', pesan: 'Sudah pernah daftar');
        }
        $op = new OsnPeserta();
        $op->osn_id = $this->osn_id;
        $op->user_id = auth()->user()->id;
        $op->data_peserta_id = auth()->user()->data_peserta->id;
        $op->nilai_rapot = $this->nilai_rapot;
        $op->nilai_matematika = $this->nilai_matematika;
        $op->nilai_fisika = $this->nilai_fisika;
        $op->nilai_kimia = $this->nilai_kimia;
        $op->nilai_biologi = $this->nilai_biologi;
        $op->save();
        $this->tutupDaftar();
        return $this->dispatch('success', pesan: 'Berhasil daftar sebagai peserta');

    }

    public function tutupDaftar()
    {
        $this->daftarPage = false;
        $this->nilai_rapot = null;
        $this->nilai_matematika = null;
        $this->nilai_fisika = null;
        $this->nilai_kimia = null;
        $this->nilai_biologi = null;
    }
}
