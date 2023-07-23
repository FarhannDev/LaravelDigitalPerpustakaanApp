<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserPetugasAdd extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $age;
    public $gender;
    public $telephone;
    public $city;
    public $province;
    // public $password;
    // public $password2;
    public $address;


    protected $rules = [
        'first_name' => 'required|min:3|max:50',
        'last_name'  => 'required|min:3|max:50',
        'email'      => 'required|string|email|max:255|unique:users',
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


    public function saveOperator()
    {
        $this->validate();

        User::create([
            'uuid'       =>     \Str::uuid(),
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'fullname'   => $this->first_name . ' ' .  $this->last_name,
            'email'      => $this->email,
            'age'        => $this->age,
            'gender'     => $this->gender,
            'telephone'  => $this->telephone,
            'city'       => $this->city,
            'province'   => $this->province,
            'password'   => Hash::make('masuk123'), // password
            'address'    => $this->address,
            'roles'      => 'petugas',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        return redirect()
            ->route('dashboard.user.operator')
            ->with('message_success', 'Petugas baru ditambahkan');
    }

    public function render()
    {
        return view('livewire.dashboard.user.user-petugas-add')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
