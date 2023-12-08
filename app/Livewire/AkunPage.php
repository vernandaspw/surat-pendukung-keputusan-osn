<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AkunPage extends Component
{
    public function render()
    {
        $users = User::query();

        $this->users = $users->get();
        return view('livewire.akun-page');
    }

    public $users = [];

    public $ID;
    public $username;
    public $password;
    public $role;
    public $isaktif;

    public $new_username;
    public $new_password;
    public $new_role;
    public $new_isaktif;

    public function simpanData()
    {
        $u = new User;
        $u->username = $this->new_username;
        $u->password = Hash::make($this->new_password);
        $u->role = $this->new_role ? $this->new_role : 'admin';
        $u->isaktif = $this->new_isaktif ? $this->new_isaktif : 1;
        $u->save();
        $this->dispatch('success', pesan: 'berhasil tambah data');
    }

    public function resetInput()
    {
        $this->ID = null;
        $this->username = null;
        $this->password = null;
        $this->role = null;
        $this->isaktif = null;
    }

    public function ubahPage($id)
    {
        $this->ID = $id;
        $user = User::find($id);
        $this->username = $user->username;
        $this->role = $user->role;
        $this->isaktif = $user->isaktif;
    }

    public function ubahData()
    {
        try {
            $cekUsername = User::where('id', '!=', $this->ID)->where('username', $this->username)->first();

            if ($cekUsername) {
                return $this->dispatch('error', pesan: 'username telah digunakan');
            }
            $user = User::find($this->ID);
            $user->username = $this->username ? $this->username : $user->username;
            if ($this->password) {
                $user->password = Hash::make($this->password);
            }
            $user->role = $this->role;
            $user->isaktif = $this->isaktif;
            $user->save();
            $this->resetInput();
            $this->dispatch('success', pesan: 'berhasil');
        } catch (\Throwable $e) {
            return $this->dispatch('error', pesan: $e->getMessage());
            # code...
        }
    }
}
