<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $fullname = null;
    public $gender = null;
    public $age = null;
    public $telephone = null;
    public $city = null;
    public $province = null;
    public $address = null;


    protected $rules = [
        'fullname' => 'required|min:3|max:50',
        'age'       => 'required',
        'gender'    => 'required',
        'telephone' => 'required',
        'city'      => 'required',
        'province'  => 'required',
        'address'   => 'required',
    ];

    protected $messages = [
        'required'       => 'isian kolom ini tidak boleh kosong.',
        'min'            => 'isian kolom ini terlalu pendek',
        'max'            => 'isian kolom ini sudah mencapai batas karakter',
        'email'          => 'isian kolom tidak sesuai dengan email domain',
        // 'password_confirmation'   => 'isian kolom tidak sesuai password sebelumnya',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveProfile()
    {
        $this->validate();

        User::where('uuid', Auth::user()->uuid)->update([
            'fullname'  => $this->fullname,
            'gender'    => $this->gender,
            'age'       => $this->age,
            'telephone' => $this->telephone,
            'city'      => $this->city,
            'province'  => $this->province,
            'address'   => $this->address,
            'updated_at' => new \DateTime(),
        ]);

        return redirect()->to('profile');
    }

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

        return view('livewire.profile.profile-edit')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
