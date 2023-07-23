<?php

namespace App\Http\Livewire\Dashboard\Book;

use Livewire\Component;
use App\Models\Book;
use App\Models\CategoryBook;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class BookAdd extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $description;
    public $category;
    public $isbn;
    public $total_books;
    public $upload_pdf;
    public $upload_cover;
    public $status;

    public $book_cover = null;
    public $book_file_pdf = null;


    protected $rules = [
        'title'  => 'required|string|min:3|max:120',
        'isbn'   => 'required|string',
        'total_books' => 'required',
        'category' => 'required',
        'upload_pdf' => 'nullable|file|mimes:pdf|max:2048',
        'upload_cover' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',

    ];

    protected $messages = [
        'title.required'       => 'Judul buku tidak boleh kosong.',
        'title.min'            => 'Judul buku terlalu pendek.',
        'title.max'            => 'Judul buku sudah maksimal.',
        'isbn.required'        => 'ISBN tidak boleh kosong.',
        'isbn.max'             => 'ISBN sudah maksimal 11 karakter',
        'total_books.required' => 'Jumlah halaman tidak boleh kosong',
        'category.required'    => 'Kategori Buku tidak boleh kosong',
        'upload_cover.required' => 'Pastikan file tidak boleh kosong',
        'upload_cover.mimes'   => 'Pastikan file yang anda upload bertipe JPEG/JPG/PNG',
        'upload_cover.image'   => 'Pastikan file yang anda upload bertipe JPEG/JPG/PNG',
        'upload_cover.max'     => 'Pastikan file yang anda upload tidak melebih dari 2MB',
        'upload_pdf.required'      => 'Pastikan file tidak boleh kosong',
        'upload_pdf.file'      => 'Pastikan file yang anda upload bertipe format PDF',
        'upload_pdf.mimes'     => 'Pastikan file yang anda upload bertipe format PDF',
        'upload_pdf.max'       => 'Pastikan file yang anda upload tidak melebih dari 2MB',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveBooks()
    {

        $this->validate();

        if ($this->upload_cover ||  $this->upload_pdf) {  // FILE OR IMAGE?
            $this->book_cover = date('Y_m_d') . '_' .  'cover_' . $this->isbn . '.png';
            $this->book_file_pdf =  date('Y_m_d') . '_' .  'pdf_' . base64_encode($this->upload_pdf) . '.pdf';

            // UPLOAD IMAGE OR FILE TO STORAGE
            $this->upload_cover->storeAs('public/upload/cover/', $this->book_cover);
            $this->upload_pdf->storeAs('public/upload/file/', $this->book_file_pdf);
        }

        Book::create([
            'title'           => $this->title,
            'slug'            => \Str::slug($this->title, '-'),
            'description'     => $this->description,
            'isbn'            => $this->isbn,
            'total_books'     => $this->total_books,
            'is_status'       => $this->status,
            'upload_pdf'      => $this->upload_pdf ? $this->book_file_pdf : null,
            'upload_cover'    => $this->upload_cover ? $this->book_cover : null,
            'category_book_id' => $this->category,
            'created_at'      => new \DateTime(),
            'updated_at'      => new \DateTime(),
        ]);

        return redirect()
            ->route('dashboard.book.index')
            ->with('message_success', 'Buku' . $this->title . ' berhasil ditambahkan');
    }


    public function render()
    {
        if ($this->title) {
            $this->isbn =
                Str::upper(Str::random(16));
        }

        return view('livewire.dashboard.book.book-add', ['categories' => CategoryBook::all()])
            ->extends('layout.page_layout')
            ->section('content');
    }
}
