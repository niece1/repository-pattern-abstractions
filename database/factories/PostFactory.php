<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => function () {
                return Category::all()->random();
            },
            'user_id' => function () {
                return User::all()->random();
            },
            'body' => $this->faker->text(100),
        ];
    }
}
