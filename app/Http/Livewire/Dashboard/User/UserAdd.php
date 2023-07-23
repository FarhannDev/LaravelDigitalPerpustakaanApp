<?php

namespace App\Http\Livewire\Dashboard\User;

use Livewire\Component;

class UserAdd extends Component
{
    public $name;
    public $email;
    public $address;
    public $password;

    public function render()
    {
        return view('livewire.dashboard.user.user-add')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
