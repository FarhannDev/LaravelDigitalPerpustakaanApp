<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Book;
use App\Models\CategoryBook;
use App\Models\User;
use Livewire\Component;

class DashboardIndex extends Component
{
    public function render()
    {
        return view('livewire.dashboard.dashboard-index', [
            'total_users' => User::where('roles', 'anggota')->count(),
            'total_petugas' => User::where('roles', 'petugas')->count(),
            'total_books' => Book::count(),
            'total_category_books' => CategoryBook::count(),
        ])
            ->extends('layout.page_layout')
            ->section('content');
    }
}
