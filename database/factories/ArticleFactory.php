<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $article_status = ['published', 'draft'];

        return [
            'title' => $this->faker->text(100),
            'body' => $this->faker->text(150),
            'status' => $article_status[rand(0,1)],
        ];
    }
}
