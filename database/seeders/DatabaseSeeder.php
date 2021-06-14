<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/categories');
        Storage::deleteDirectory('public/authors');
        Storage::deleteDirectory('public/editorials');
        Storage::deleteDirectory('public/books');
        Storage::makeDirectory('public/categories');
        Storage::makeDirectory('public/authors');
        Storage::makeDirectory('public/editorials');
        Storage::makeDirectory('public/books');

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            EditorialSeeder::class,
            BookSeeder::class,
            BooksAuthorsSeeder::class
        ]);
    }
}
