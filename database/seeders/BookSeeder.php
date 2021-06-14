<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Image;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory(200)->create()->each(function (Book $book) {
            Image::factory(4)->create([
                'imageable_id' => $book->id,
                'imageable_type' => Book::class
            ]);
        });
    }
}
