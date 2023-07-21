<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = [
        'title', 'slug', 'description', 'isbn', 'total_books', 'upload_pdf', 'upload_cover', 'is_status', 'category_book_id'
    ];
}
