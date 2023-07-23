<?php

namespace App\Http\Livewire\User;

use App\Models\Book;
use Livewire\Component;

class UserBookShow extends Component
{
    public $data = null;

    public function mount($slug)
    {
        $book = Book::where('slug', $slug)->first();

        if (!is_null($book)) {
            $this->data = $book;
        }
    }

    public function render()
    {
        return view('livewire.user.user-book-show', [
            'data' => $this->data,
        ])
            ->extends('layout.page_layout')
            ->section('content');
    }
}
