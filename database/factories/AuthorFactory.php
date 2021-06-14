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
            'name' => $name,
            'country' => $this->faker->country(),
            'slug' => Str::slug($name),
            'image' => 'authors/' . $this->faker->image('public/storage/authors', 640, 480, null, false)
        ];
    }
}
