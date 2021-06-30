<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name($gender = 'male' | 'female');
        return [
            'nombre' => $name,
            'ciudad' => $this->faker->country(),
            'slug' => Str::slug($name)
        ];
    }
}
