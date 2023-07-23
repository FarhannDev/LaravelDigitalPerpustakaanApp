<?php

namespace App\Http\Livewire\User;

use App\Models\Book;
use App\Models\CategoryBook;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class UserBookList extends Component
{
    use WithPagination;

    public $category;
    public $search;
    public $updated;
    public $inserted;
    protected $queryString = [
        'search' => ['except' => ''],
        'updated' => ['except' => ''],
        'inserted' => ['except' => ''],
        'category' => ['except' => ''],
    ];


    public function render()
    {
        $items = Book::when($this->search, function (EloquentBuilder $builder) {
            $builder->where('title', 'like', '%' . trim($this->search) . '%');
        })->when($this->inserted, function (EloquentBuilder $builder) {
            $builder->where('created_at', 'like', '%' . $this->inserted . '%');
        })->when($this->updated, function (EloquentBuilder $builder) {
            $builder->where('updated_at', 'like', '%' . $this->updated . '%');
        })->when($this->category, function (EloquentBuilder $query) {
            $query->whereHas('category', function (EloquentBuilder $q) {
                $q->where('category_name', 'like', '%' . trim($this->category) . '%');
            });
        })->latest()->paginate(10);

        return view('livewire.user.user-book-list', [
            'items' => $items,
            'categories' => CategoryBook::orderBy("category_name", 'ASC')->latest()->get(),

        ])
            ->extends('layout.page_layout')
            ->section('content');
    }
}
