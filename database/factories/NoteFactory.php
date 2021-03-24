<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'body' => $this->faker->text,
            'is_important' => $this->faker->boolean,
            'article_id' => Article::factory()->has(User::factory())
        ];
    }
}
