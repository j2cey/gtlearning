<?php

namespace Database\Factories;

use App\Models\Chapitre;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapitreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chapitre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nb_words = rand(1, 4);
        return [
            'intitule' => $this->faker->unique()->sentence($nb_words),
            'description' => $this->faker->unique()->paragraph(),
            'posi' => $this->faker->unique()->randomNumber()
        ];
    }
}
