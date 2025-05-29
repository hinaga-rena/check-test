<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'       => $this->faker->name(),
            'gender'     => $this->faker->randomElement(['男性', '女性', 'その他']),
            'email'      => $this->faker->unique()->safeEmail(),
            'tel'        => $this->faker->numerify('0##########'),
            'address'    => $this->faker->address(),
            'building'   => $this->faker->secondaryAddress(),
            'category_id'=> Category::inRandomOrder()->first()->id,
            'message'    => $this->faker->realText(100),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}