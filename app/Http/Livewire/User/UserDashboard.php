<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboard extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboard')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
