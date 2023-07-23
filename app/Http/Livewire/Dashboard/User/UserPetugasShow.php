<?php

namespace App\Http\Livewire\Dashboard\User;

use Livewire\Component;

class UserPetugasShow extends Component
{
    public function render()
    {
        return view('livewire.dashboard.user.user-petugas-show')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
