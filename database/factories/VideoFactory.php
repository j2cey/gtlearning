<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nb_words = rand(1, 4);
        return [
            'name' => $this->faker->unique()->sentence($nb_words),
            'role' => Str::slug($this->faker->sentence(2), "_")
        ];
    }
}
