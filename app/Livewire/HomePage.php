<?php

namespace App\Livewire;

use App\Models\DataPeserta;
use App\Models\Kelas;
use App\Models\SubKelas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $this->kelas = Kelas::get();
        if ($this->kelas_id) {
            $this->subkelas = SubKelas::where('kelas_id', $this->kelas_id)->get();
        }
        return view('livewire.home-page');
    }
    public $user, $data_peserta, $kelas, $subkelas;
    public $nik, $nama, $tgl_lahir, $bio, $kelas_id, $sub_kelas_id, $alamat, $telp;

    public $isLogin = true;

    public $username;

    public $password;

    public function mount()
    {
        if (auth()->check()) {
            redirect('dashboard');
        }
    }

    public function masuk()
    {
        $user = User::where('username', $this->username)->first();
        if (!$user) {
            return $this->dispatch('error', pesan: 'username salah');
        }
        if (!Hash::check($this->password, $user->password)) {
            return $this->dispatch('error', pesan: 'password salah');
        }
        if (!$user->isaktif) {
            return $this->dispatch('error', pesan: 'akun tidak aktif');
        }
        auth()->login($user, true);
        redirect('dashboard');
    }

    public function daftar()
    {
        $this->validate([
            'nik' => [
                'required',
                'max:30',
                'min:3',
                'unique:data_pesertas,nik',
            ],
        ], [
            'nik.required' => 'Kolom nik tidak boleh kosong.',
            'nik.max' => 'Panjang nik tidak boleh melebihi :max karakter.',
            'nik.min' => 'Panjang nik minimal :min karakter.',
            'nik.unique' => 'nik sudah digunakan. Pilih nik lain / hubungi admin untuk password login',
        ]);
        $this->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                'min:3',
                'alpha_dash',
                'unique:users,username',
            ],
        ], [
            'username.required' => 'Kolom username tidak boleh kosong.',
            'username.string' => 'Username harus berupa string.',
            'username.max' => 'Panjang username tidak boleh melebihi :max karakter.',
            'username.min' => 'Panjang username minimal :min karakter.',
            'username.alpha_dash' => 'Username hanya boleh mengandung huruf, angka, garis bawah, dan tanda hubung.',
            'username.unique' => 'Username sudah digunakan. Pilih username lain.',
        ]);
        $this->validate([
            'password' => [
                'required',
                'string',
                'min:6', // Panjang password minimal 8 karakter
            ],
        ], [
            'password.required' => 'Kolom password tidak boleh kosong.',
            'password.string' => 'Password harus berupa string.',
            'password.min' => 'Panjang password minimal :min karakter.',
        ]);
        // END VALIDASI
        try {
            DB::beginTransaction();

            $user = new User();
            $user->username = $this->username;
            $user->password = Hash::make($this->password);
            $user->role = 'peserta';
            $user->save();

            $data_peserta = new DataPeserta();
            $data_peserta->user_id = $user->id;
            $data_peserta->nik = $this->nik;
            $data_peserta->nama = $this->nama;
            $data_peserta->tgl_lahir = $this->tgl_lahir;
            $data_peserta->bio = $this->bio;
            $data_peserta->kelas_id = $this->kelas_id;
            $data_peserta->sub_kelas_id = $this->sub_kelas_id;
            $data_peserta->alamat = $this->alamat;
            $data_peserta->telp = $this->telp;
            $data_peserta->save();

            auth()->login($user, true);
            DB::commit();
            redirect('dashboard');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->dispatch('error', pesan: $e->getMessage());
        }
    }
}
