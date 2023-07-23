<?php

namespace App\Http\Livewire\User;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserEditProfil extends Component
{
    public $fullname;
    public $gender;
    public $age;
    public $telephone;
    public $city;
    public $province;
    public $address;

    protected $rules = [
        'fullname' => 'required|min:3|max:120',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveProfile()
    {
        $this->validate();

        Member::create([
            'user_id'   => Auth::user()->id,
            'fullname'  => $this->fullname,
            'gender'    => $this->gender,
            'age'       => $this->age,
            'telephone' => $this->telephone,
            'city'      => $this->city,
            'province'  => $this->province,
            'address'   => $this->address,
        ]);

        return redirect()->to('/user/profile');
    }

    public function mount()
    {
        $this->fullname = Auth::user()->fullname;
        $this->age = Auth::user()->age;
    }

    public function render()
    {
        $this->fullname = Auth::user()->fullname;
        $this->age = Auth::user()->age;

        return view('livewire.user.user-edit-profil')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
