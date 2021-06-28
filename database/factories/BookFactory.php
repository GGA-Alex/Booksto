<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence();
        $category = Category::all()->random();
        $editorial = Editorial::all()->random();
        return [
            'isbn' => $this->faker->unique()->regexify('[0-9]{2,3}\-[0-9]{1,5}\-[0-9]{1,7}\-[0-9]{1,6}\-[0-9]{1,3}'),
            'nombre' => $name,
            'descripcion' => $this->faker->text(200),
            'paginas' => $this->faker->numberBetween(50, 1000),
            'precio' => $this->faker->randomFloat(2, 100, 1000),
            'año' => $this->faker->numberBetween(2000, 2021),
            'edicion' => $this->faker->numberBetween(1, 20),
            'status' => $this->faker->numberBetween(1, 2),
            'slug' => Str::slug($name),
            'category_id' => $category->id,
            'editorial_id' => $editorial->id
        ];
    }
}
