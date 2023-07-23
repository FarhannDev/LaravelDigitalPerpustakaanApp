<?php

namespace App\Http\Livewire\Dashboard\Book;

use Livewire\Component;
use App\Models\Book;
use App\Models\CategoryBook;
use Livewire\WithFileUploads;

class BookEdit extends Component
{
    use WithFileUploads;

    public $book_id;
    public $title;
    public $slug;
    public $description;
    public $category;
    public $isbn;
    public $total_books;
    public $upload_pdf;
    public $upload_cover;
    public $status = true;

    public $book_cover = null;
    public $book_file_pdf = null;

    public $book_cover_original = null;
    public $book_file_pdf_original = null;

    public function mount($slug)
    {
        $book = Book::where('slug', $slug)->first();

        if (!is_null($book)) {
            $this->book_id = $book->slug;
            $this->title = $book->title;
            $this->slug = $book->slug;
            $this->description = $book->description;
            $this->category = $book->category_book_id;
            $this->isbn = $book->isbn;
            $this->total_books = $book->total_books;
            $this->upload_pdf = $book->upload_pdf;
            $this->upload_cover = $book->upload_cover;
            $this->status = $book->is_status;

            $this->book_cover_original = asset('storage/upload/cover/' . $book->upload_cover);
            $this->book_file_pdf_original = asset('storage/upload/file/' . $book->upload_pdf);
        }
    }


    protected $rules = [
        'title'  => 'required|string|min:3|max:120',
        'isbn'   => 'required|string|max:11',
        'total_books' => 'required',
        'category' => 'required',
        'upload_pdf' => 'file|mimes:pdf|max:2048',
        'upload_cover' => 'image|mimes:jpeg,jpg,png|max:2048',

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

    public function updateBooks()
    {
        $this->validate();

        if (!is_null($this->book_id)) {
            $book = Book::where('slug', $this->book_id)->first();

            if (!is_null($this->upload_cover ||  $this->upload_pdf)) {  // FILE OR IMAGE?
                $this->book_cover = base64_encode($this->upload_cover) . '.png';
                $this->book_file_pdf =  base64_encode($this->upload_pdf) . '.pdf';

                // Remove upload file from storage
                \File::delete('storage/upload/file/' . $book->upload_pdf);
                \File::delete('storage/upload/cover/' . $book->upload_cover);

                // UPLOAD IMAGE OR FILE TO STORAGE
                $this->upload_cover->storeAs('public/upload/cover/', $this->book_cover);
                $this->upload_pdf->storeAs('public/upload/file/', $this->book_file_pdf);
            }

            $book->update([
                'title'           => $this->title,
                'slug'            => \Str::slug($this->title, '-'),
                'description'     => $this->description,
                'isbn'            => $this->isbn,
                'total_books'     => $this->total_books,
                'is_status'       => $this->status ? 'publish' : 'unpublish',
                'upload_pdf'      => $this->upload_pdf ? $this->book_file_pdf : $book->upload_pdf,
                'upload_cover'    => $this->upload_cover ? $this->book_cover : $book->upload_cover,
                'category_book_id' => $this->category,
                'updated_at'      => new \DateTime(),
            ]);

            return redirect()
                ->route('dashboard.book.index')
                ->with('message_success', 'Buku' . $book->title . ' berhasil diperbarui');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.book.book-edit', ['categories' => CategoryBook::all()])
            ->extends('layout.page_layout')
            ->section('content');
    }
}
