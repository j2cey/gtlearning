<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createNew("Primaire", 0, "primaire_default.jpg", "Primaire");
        $this->createNew("Collège", 1, "college_default.png", "Collège");
        $this->createNew("Lycée", 2, "lycee_default.png", "Lycée");
        $this->createNew("Supérieur", 3, "superieur_default.jpg", "Supérieur");
    }

    private function createNew($intitule, $level, $image, $description = null)
    {
        $data = [
            'intitule' => $intitule, 'level' => $level, 'image' => $image
        ];
        if (!is_null($description)) {
            $data['description'] = $description;
        }
        return Niveau::create($data);
    }
}
