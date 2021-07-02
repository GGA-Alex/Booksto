<?php

namespace Database\Factories;

use App\Models\Editorial;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EditorialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Editorial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->regexify('[A-Za-z]{5,20}');;
        return [
            'nombre' => $name,
            'direccion' => $this->faker->streetAddress(),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'ciudad' => $this->faker->country(),
            'slug' => Str::slug($name)
        ];
    }
}
