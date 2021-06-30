<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Image;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory(30)->create()->each(function(Author $author){
            Image::factory(1)->create([
                'imageable_id' => $author->id,
                'imageable_type' => Author::class
            ]);
        });
    }
}
