<?php

namespace App\Http\Livewire\Dashboard\Book;

use App\Models\CategoryBook;
use Livewire\Component;


class BookCategoryAdd extends Component
{

    public $category_name;

    protected $rules = ['category_name' => 'required|string|min:3|max:100'];

    protected $messages = [
        'category_name.required' => 'Kategori tidak boleh kosong',
        'category_name.min' => 'Kategori terlalu pendek',
        'category_name.max' => 'Kategori sudah maksimal 100 karakter',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveCategory()
    {
        $this->validate();

        CategoryBook::create([
            'category_name' => $this->category_name,
            'category_slug' => \Str::slug($this->category_name, '-'),
            'created_at'    => new \DateTime(),
            'updated_at'    => new \DateTime(),
        ]);

        return redirect()
            ->route('dashboard.book.category.index')
            ->with('message_success', 'Kategori' . $this->category_name . ' berhasil ditambahkan');
    }


    public function render()
    {
        return view('livewire.dashboard.book.book-category-add')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
