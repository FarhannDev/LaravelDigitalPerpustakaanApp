<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class UserPetugasIndex extends Component
{
    use WithPagination;

    public $search;
    public $status;
    public $joined;
    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'joined' => ['except' => ''],
    ];


    public function deleteOperator($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()
            ->route('dashboard.user.operator')
            ->with('message_success', 'Data petugas berhasil dihapus');
    }


    public function render()
    {
        $users = User::where('roles', 'petugas')->when($this->search, function (EloquentBuilder $query) {
            $query->where('first_name', 'like', '%' . trim($this->search) . '%');
        })->when($this->status, function (EloquentBuilder $query) {
            $query->where('is_status', $this->status);
        })->when($this->joined, function (EloquentBuilder $query) {
            $query->where('created_at', 'like', '%' . $this->joined . '%');
        })->latest()->paginate(10);

        return view('livewire.dashboard.user.user-petugas-index', [
            'users' => $users,
        ])
            ->extends('layout.page_layout')
            ->section('content');
    }
}
