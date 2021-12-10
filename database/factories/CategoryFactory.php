<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::all()->random();
            },
            'title' => $title = $this->faker->unique()->word,
            'slug' => Str::slug($title),
            'live' => $this->faker->boolean ? true : false,
        ];
    }
}
