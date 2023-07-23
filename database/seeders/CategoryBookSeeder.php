<?php

namespace Database\Seeders;

use App\Models\CategoryBook;
use Illuminate\Database\Seeder;

class CategoryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'category_name' => 'Buku Tahunan',
                'category_slug' => 'buku-tahunan',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),

            ],
            [
                'category_name' => 'Buku Pegangan',
                'category_slug' => 'buku-pegangan',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),

            ],
            [
                'category_name' => 'Buku Petunjuk',
                'category_slug' => 'buku-petunjuk',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),

            ],
            [
                'category_name' => 'ensiklopedi',
                'category_slug' => 'ensiklopedi',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),

            ],
            [
                'category_name' => 'Kamus',
                'category_slug' => 'kamus',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),

            ],
            [
                'category_name' => 'Sumber biografi',
                'category_slug' => 'sumber-biografi',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),

            ],
        ];

        foreach ($data as $value) {
            CategoryBook::create($value);
        }
    }
}
