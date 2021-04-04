<?php

namespace Database\Factories;

use App\Models\Personne;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personne::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(["male","female"]);
        return [
            'email' => $this->faker->unique()->email(),
            'nom' => ucfirst($this->faker->unique()->lastName($gender)),
            'prenom' => ucfirst($this->faker->unique()->firstName($gender)),
            'sexe' => $gender,
            'adresse' => ucfirst($this->faker->unique()->address()),
            'telephone' => $this->faker->unique()->phoneNumber(),
            'fonction' => ucfirst($this->faker->unique()->jobTitle())
        ];
    }
}
