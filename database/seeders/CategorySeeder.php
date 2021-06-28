<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'nombre' => 'Novedades',
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => Str::slug('Novedades'),
            ],
            [
                'nombre' => 'Adolescentes',
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => Str::slug('Adolescentes'),
            ],
            [
                'nombre' => 'Niños',
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => Str::slug('Niños'),
            ],
            [
                'nombre' => 'Ciencia Ficcion',
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => Str::slug('Ciencia Ficcion'),
            ],
            [
                'nombre' => 'Educación',
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => Str::slug('Educación'),
            ],
            [
                'nombre' => 'Ebooks',
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => Str::slug('Ebooks'),
            ],
            [
                'nombre' => 'Biografia',
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => Str::slug('Biografia'),
            ],
            [
                'nombre' => 'Bolsillo',
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => Str::slug('Bolsillo'),
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
