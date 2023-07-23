<?php

namespace App\Http\Livewire\Dashboard\Book;

use App\Models\CategoryBook;
use Livewire\Component;
use Livewire\WithPagination;

class BookCategoryIndex extends Component
{
    use WithPagination;
    public function delete($id = null)
    {
        $items = CategoryBook::findOrFail($id);
        $items->delete();

        return redirect()
            ->route('dashboard.book.category.index')
            ->with('message_success', 'Kategori buku' . $items->title . ' berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.dashboard.book.book-category-index', [
            'items' => CategoryBook::latest()->paginate(10),
        ])
            ->extends('layout.page_layout')
            ->section('content');
    }
}
