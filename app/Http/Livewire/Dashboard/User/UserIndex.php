<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class UserIndex extends Component
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


    public function deleteUsers($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()
            ->route('dashboard.user.index')
            ->with('message_success', 'Anggota berhasil dihapus');
    }


    public function render()
    {
        $users = User::where('roles', 'anggota')->when($this->search, function (EloquentBuilder $query) {
            $query->where('first_name', 'like', '%' . trim($this->search) . '%');
        })->when($this->status, function (EloquentBuilder $query) {
            $query->where('is_status', $this->status);
        })->when($this->joined, function (EloquentBuilder $query) {
            $query->where('created_at', 'like', '%' . $this->joined . '%');
        })->orderBy('first_name', 'ASC')->latest()->paginate(10);

        return view('livewire.dashboard.user.user-index', [
            'users' => $users,
        ])
            ->extends('layout.page_layout')
            ->section('content');
    }
}
