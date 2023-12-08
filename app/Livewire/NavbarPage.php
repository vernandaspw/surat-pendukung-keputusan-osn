<?php

namespace App\Livewire;

use Livewire\Component;

class NavbarPage extends Component
{
    public function render()
    {
        return view('livewire.navbar-page');
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        redirect('/');
    }
}
