<?php

namespace App\Livewire;

use App\Models\DataPeserta;
use App\Models\Kelas;
use App\Models\SubKelas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PesertaPage extends Component
{
    public function render()
    {
        $this->kelass = Kelas::get();

        if ($this->kelas_id) {
            $this->sub_kelass = SubKelas::where('kelas_id', $this->kelas_id)->get();
        }

        $this->datas = DataPeserta::latest()->get();
        return view('livewire.peserta-page');
    }

    public $datas = [];
    public $kelass = [];
    public $sub_kelass = [];
    public $ID;

    public $createPage = false;

    public $username;
    public $password;
    public $nik;
    public $nama;
    public $tgl_lahir;
    public $bio;
    public $kelas_id;
    public $sub_kelas_id;
    public $alamat;
    public $telp;
    public $isaktif = true;

    public function create()
    {
        try {
            // buat akun
            $user = new User();
            $user->username = $this->nik;
            $user->password = Hash::make($this->password);
            $user->role = 'peserta';
            $user->isaktif = $this->isaktif;
            $user->save();

            // buat data peserta
            $dp = new DataPeserta();
            $dp->nik = $this->nik;
            $dp->user_id = $user->id;
            $dp->nama = $this->nama;
            $dp->tgl_lahir = $this->tgl_lahir;
            $dp->bio = $this->bio;
            $dp->kelas_id = $this->kelas_id;
            $dp->sub_kelas_id = $this->sub_kelas_id;
            $dp->alamat = $this->alamat;
            $dp->telp = $this->telp;
            $dp->isaktif = $this->isaktif;
            $dp->save();

            $this->dispatch('success', pesan: 'berhasil tambah data');
            $this->createPage = false;
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    public function ubahPage($id)
    {
        $this->ID = $id;
        $data = DataPeserta::find($this->ID);
        $u = User::find($data->user_id);
        $this->username = $u->username;
        $this->isaktif = $u->isaktif;
        $this->nik = $data->nik;
        $this->nama = $data->nama;
        $this->tgl_lahir = $data->tgl_lahir;
        $this->bio = $data->bio;
        $this->kelas_id = $data->kelas_id;
        $this->sub_kelas_id = $data->sub_kelas_id;
        $this->alamat = $data->alamat;
        $this->telp = $data->telp;
    }

    public function edit()
    {
        try {
            // buat akun
            $data = DataPeserta::find($this->ID);
            $user = User::find($data->user_id);
            $user->username = $this->username ? $this->username : $user->username;
            $user->password = $this->password ? Hash::make($this->password) : $user->password;
            $user->isaktif = $this->isaktif;
            $user->save();

            // buat data peserta
            $dp = DataPeserta::find($this->ID);
            $dp->nik = $this->nik;
            $dp->user_id = $user->id;
            $dp->nama = $this->nama;
            $dp->tgl_lahir = $this->tgl_lahir;
            $dp->bio = $this->bio;
            $dp->kelas_id = $this->kelas_id;
            $dp->sub_kelas_id = $this->sub_kelas_id;
            $dp->alamat = $this->alamat;
            $dp->telp = $this->telp;
            $dp->isaktif = $this->isaktif;
            $dp->save();

            $this->dispatch('success', pesan: 'berhasil tambah data');
            $this->createPage = false;
            $this->ID = null;
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

    }
}
