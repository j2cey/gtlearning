<?php

namespace Database\Factories;

use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Session::class;

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
            'posi' => $this->faker->unique()->randomNumber(),
            'lien' => $this->faker->shuffleString(),
            'duree_mm' => $this->faker->randomNumber(),
            'duree_ss' => $this->faker->randomNumber()
        ];
    }
}
