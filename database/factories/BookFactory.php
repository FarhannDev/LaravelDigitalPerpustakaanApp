<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Book::class;
    public function definition()
    {
        return [
            'title'       => $this->faker->sentence(1),
            'slug'        => $this->faker->slug(),
            'description' => $this->faker->sentence(),
            'isbn'        => $this->faker->isbn13(),
            'total_books' => 100,
            'upload_pdf'  => "default.pdf",
            'upload_cover' => "default.pdf",
            'is_status'    => 'draft',
            // 'category_book_id'  => mt_rand(1, 6)
        ];
    }
}
