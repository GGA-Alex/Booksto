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
        Storage::deleteDirectory('public/authors');
        Storage::deleteDirectory('public/books');
        Storage::makeDirectory('public/authors');
        Storage::makeDirectory('public/books');

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            EditorialSeeder::class,
            BookSeeder::class,
            BooksAuthorsSeeder::class,
            StateSeeder::class
        ]);
    }
}
