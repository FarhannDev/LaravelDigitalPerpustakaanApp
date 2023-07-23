<?php

namespace App\Http\Livewire\Dashboard\Book;

use Livewire\Component;
use App\Models\Book;
use App\Models\CategoryBook;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class BookIndex extends Component
{
    use WithPagination;

    public $category;
    public $search;
    public $status;
    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'category' => ['except' => ''],
    ];


    public function delete($id)
    {
        $item = Book::findOrFail($id);

        if (
            \File::exists('storage/upload/file/' . $item->upload_pdf)
            && \File::exists('storage/upload/cover/' . $item->upload_cover)
        ) {
            \File::delete('storage/upload/file/' . $item->upload_pdf);
            \File::delete('storage/upload/cover/' . $item->upload_cover);
        }

        $item->delete();

        return redirect()
            ->route('dashboard.book.index')
            ->with('message_success', 'Buku ' . $item->title . ' berhasil dihapus.');
    }

    public function render()
    {
        $items = Book::when($this->search, function (EloquentBuilder $query) {
            $query->where('title', 'like', '%' . trim($this->search) . '%')
                ->orWhere('isbn', 'like', '%' . trim($this->search) . '%');
        })->when($this->status, function (EloquentBuilder $query) {
            $query->where('is_status', $this->status);
        })->when($this->category, function (EloquentBuilder $query) {
            $query->whereHas('category', function (EloquentBuilder $q) {
                $q->where('category_name', 'like', '%' . trim($this->category) . '%');
            });
        })->latest()->paginate(10);


        return view('livewire.dashboard.book.book-index', [
            'items'      => $items,
            'categories' => CategoryBook::orderBy("category_name", 'ASC')->latest()->get(),
        ])
            ->extends('layout.page_layout')
            ->section('content');
    }
}
