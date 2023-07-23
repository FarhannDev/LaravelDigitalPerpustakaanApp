<?php

namespace App\Http\Livewire\Dashboard\Book;

use App\Models\CategoryBook;
use Livewire\Component;

class BookCategoryEdit extends Component
{
    public $category_slug;
    public $category_name;

    public function mount($slug)
    {
        $item = CategoryBook::where('category_slug', $slug)->first();
        if (!is_null($item)) {
            $this->category_slug = $item->category_slug;
            $this->category_name = $item->category_name;
        }
    }

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

    public function updateCategory()
    {
        $this->validate();

        CategoryBook::where('category_slug', $this->category_slug)->update([
            'category_name' => $this->category_name,
            'category_slug' => \Str::slug($this->category_name, '-'),
            'updated_at'    => new \DateTime(),
        ]);


        return redirect()
            ->route('dashboard.book.category.index')
            ->with('message_success', 'Kategori' . $this->category_name . ' berhasil diperbarui');
    }



    public function render()
    {
        return view('livewire.dashboard.book.book-category-edit')
            ->extends('layout.page_layout')
            ->section('content');
    }
}
