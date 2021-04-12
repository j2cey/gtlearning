<?php

namespace Database\Seeders;

use App\Models\File;
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
        $image = ['name' => "primaire_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 219383];
        $this->createNew("Primaire", 0, $image, "Primaire");
        $image = ['name' => "college_default.png", 'type' => "image/png", 'extension' => "png", 'size' => 488159];
        $this->createNew("Collège", 1, $image, "Collège");
        $image = ['name' => "lycee_default.png", 'type' => "image/png", 'extension' => "png", 'size' => 536549];
        $this->createNew("Lycée", 2, $image, "Lycée");
        $image = ['name' => "superieur_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 59876];
        $this->createNew("Supérieur", 3, $image, "Supérieur");
    }

    private function createNew($intitule, $level, $image, $description = null)
    {
        $data = [
            'intitule' => $intitule, 'level' => $level
        ];
        if (!is_null($description)) {
            $data['description'] = $description;
        }
        $niveau = Niveau::create($data);

        File::create([
            'config_dir' => "niveaux_files_dir",
            'model_type' => "App\Models\Niveau",
            'model_id' => $niveau->id,
            'name' => $image['name'],
            'role' => "image_niveau",
            'type' => $image['type'],
            'size' => $image['size'],
            'extension' => $image['extension'],
        ]);

        return $niveau;
    }
}
