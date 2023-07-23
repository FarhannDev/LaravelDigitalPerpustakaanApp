<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileIndex extends Component
{
    public $fullname = null;
    public $gender = null;
    public $age = null;
    public $telephone = null;
    public $city = null;
    public $province = null;
    public $address = null;

    public function mount()
    {
        $this->fullname = Auth::user()->fullname;
        $this->age = Auth::user()->age;
        $this->gender = Auth::user()->gender;
        $this->telephone = Auth::user()->telephone;
        $this->city = Auth::user()->city;
        $this->province = Auth::user()->province;
        $this->address = Auth::user()->address;
    }

    public function render()
    {
        return view('livewire.profile.profile-index')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
