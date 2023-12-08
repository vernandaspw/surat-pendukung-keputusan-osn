<?php

namespace App\Livewire;

use App\Models\DataPeserta;
use App\Models\Kelas;
use App\Models\SubKelas;
use App\Models\User;
use Livewire\Component;

class DashboardPage extends Component
{
    public function render()
    {
        if (auth()->user()->role == 'peserta') {
            $this->kelas = Kelas::get();
            if ($this->kelas_id) {
                $this->subkelas = SubKelas::where('kelas_id', $this->kelas_id)->get();
            }
        }
        return view('livewire.dashboard-page');
    }

    public $user, $data_peserta, $kelas, $subkelas;
    public $username, $nik, $nama, $tgl_lahir, $bio, $kelas_id, $sub_kelas_id, $alamat, $telp;

    public function mount()
    {
        if (auth()->user()->role == 'peserta') {
            $this->fetchData();
        }
    }

    public function fetchData()
    {
        $this->user = User::find(auth()->user()->id);
        $this->username = $this->user->username;
        $this->data_peserta = DataPeserta::where('user_id', auth()->user()->id)->first();
        if (!$this->data_peserta) {
            $dataP = new DataPeserta();
            $dataP->user_id = auth()->user()->id;
            $dataP->save();
        }
        $this->nik = $this->data_peserta->nik ?? $this->data_peserta->nik;
        $this->nama = $this->data_peserta->nama ?? $this->data_peserta->nama;
        $this->tgl_lahir = $this->data_peserta->tgl_lahir ?? $this->data_peserta->tgl_lahir;
        $this->bio = $this->data_peserta->bio ?? $this->data_peserta->bio;
        $this->kelas_id = $this->data_peserta->kelas_id ?? $this->data_peserta->kelas_id;
        $this->sub_kelas_id = $this->data_peserta->sub_kelas_id ?? $this->data_peserta->sub_kelas_id;
        $this->alamat = $this->data_peserta->alamat ?? $this->data_peserta->alamat;
        $this->telp = $this->data_peserta->telp ?? $this->data_peserta->telp;
    }

    public function perbaruiData()
    {
        try {
            $user = User::find(auth()->user()->id);

            $data_peserta = DataPeserta::where('user_id', auth()->user()->id)->first();
            $data_peserta->nik = $this->nik;
            $data_peserta->nama = $this->nama;
            $data_peserta->tgl_lahir = $this->tgl_lahir;
            $data_peserta->bio = $this->bio;
            $data_peserta->kelas_id = $this->kelas_id;
            $data_peserta->sub_kelas_id = $this->sub_kelas_id;
            $data_peserta->alamat = $this->alamat;
            $data_peserta->telp = $this->telp;
            $data_peserta->save();

            $this->dispatch('success', pesan: 'Berhasil perbarui data');
        } catch (\Throwable $e) {
            $this->dispatch('error', pesan: $e->getMessage());
        }

    }
}
