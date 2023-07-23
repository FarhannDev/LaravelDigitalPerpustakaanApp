<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserPetugasEdit extends Component
{
    public $userId;
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
    public $status;
    public $isstatus = false;


    public function mount($id)
    {

        $user = User::where('uuid', $id)->first();

        if (!is_null($user)) {
            $this->userId      = $user->uuid;
            $this->first_name  = $user->first_name;
            $this->last_name    = $user->last_name;
            $this->email        = $user->email;
            $this->age          = $user->age;
            $this->gender       = $user->gender;
            $this->telephone    = $user->telephone;
            $this->city         = $user->city;
            $this->province     = $user->province;
            $this->address      = $user->address;
            $this->status       = $user->is_status;
        }
    }

    protected $rules = [
        'first_name' => 'required|min:3|max:50',
        'last_name'  => 'required|min:3|max:50',
        'email'      => 'required|string|email|max:255',
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

        User::where('uuid', $this->userId)->update([
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'fullname'   => $this->first_name . ' ' .  $this->last_name,
            'email'      => $this->email,
            'age'        => $this->age,
            'gender'     => $this->gender,
            'telephone'  => $this->telephone,
            'city'       => $this->city,
            'province'   => $this->province,
            'address'    => $this->address,
            'is_status'  => $this->isstatus ? 'active' : 'unactive',
            'updated_at' => new \DateTime(),
        ]);

        return redirect()
            ->route('dashboard.user.operator')
            ->with('message_success', 'Petugas baru ditambahkan');
    }




    public function render()
    {
        // if ($this->status) dd($this->status);

        return view('livewire.dashboard.user.user-petugas-edit')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
