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
                'name' => 'Novedades',
                'slug' => Str::slug('Novedades'),
            ],
            [
                'name' => 'Adolescentes',
                'slug' => Str::slug('Adolescentes'),
            ],
            [
                'name' => 'Niños',
                'slug' => Str::slug('Niños'),
            ],
            [
                'name' => 'Ciencia Ficcion',
                'slug' => Str::slug('Ciencia Ficcion'),
            ],
            [
                'name' => 'Educación',
                'slug' => Str::slug('Educación'),
            ],
            [
                'name' => 'Ebooks',
                'slug' => Str::slug('Ebooks'),
            ],
            [
                'name' => 'Biografia',
                'slug' => Str::slug('Biografia'),
            ],
            [
                'name' => 'Bolsillo',
                'slug' => Str::slug('Bolsillo'),
            ],
        ];

        foreach ($categories as $category) {
            Category::factory(1)->create($category);
        }
    }
}
