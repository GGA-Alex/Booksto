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
        $name = $this->faker->sentence(2);
        return [
            'name' => $name,
            'address' => $this->faker->streetAddress(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'country' => $this->faker->country(),
            'slug' => Str::slug($name),
            'image' => 'editorials/' . $this->faker->image('public/storage/editorials', 640, 480, null, false)
        ];
    }
}
