<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::all();

        foreach ($books as $book) {
            $author = Author::all()->random();
            $book->authors()->attach($author->id);
        }

        foreach ($books as $book) {
            $author = Author::all()->random();
            $book->authors()->attach($author->id);
        }
    }
}
