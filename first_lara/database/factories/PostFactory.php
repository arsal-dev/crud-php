<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->unique()->text($maxNbChars = 6),
            'image_path' => 'temp_img.png',
            'discription' => $this->faker->text($maxNbChars = 100),
            'body' => $this->faker->text($maxNbChars = 300),
        ];
    }
}
