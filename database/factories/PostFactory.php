<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'md5' => $this->faker->unique()->md5(),
            'rating' => $this->faker->randomElement(['s', 'q', 'e']),
            'file_ext' => $this->faker->fileExtension(),
            'source' => $this->faker->url(),
            'author_id' => User::factory()
        ];
    }
}
