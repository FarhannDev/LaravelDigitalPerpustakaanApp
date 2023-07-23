<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    use HasFactory;

    protected $table = "category_books";
    protected $fillable = ['category_name', 'category_slug'];


    public function books()
    {
        return $this->hasMany(Book::class, 'book_id');
    }
}
