<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Classe;
use App\Models\Niveau;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveau = Niveau::where('intitule', "Primaire")->first();
        $image = ['name' => "cp_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 89823];
        $this->createNew("Cours Préparatoire 1", "CP 1", $niveau->id, $image, "Première classe de l'école élémentaire française, le cours préparatoire, en abrégé « CP », est la première année d'instruction obligatoire en France, durant laquelle se poursuit l'apprentissage de la lecture, qui est commencé en maternelle, éventuellement au jardin d'enfant ou garde à domicile, car avant le 1er septembre 2019 la maternelle n'était pas obligatoire.");
        $image = ['name' => "cp2_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 37993];
        $this->createNew("Cours Préparatoire 2", "CP 2", $niveau->id, $image, "Première classe de l'école élémentaire française, le cours préparatoire, en abrégé « CP », est la première année d'instruction obligatoire en France, durant laquelle se poursuit l'apprentissage de la lecture, qui est commencé en maternelle, éventuellement au jardin d'enfant ou garde à domicile, car avant le 1er septembre 2019 la maternelle n'était pas obligatoire.");
        $image = ['name' => "ce1_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 57249];
        $this->createNew("Cours Elémentaire 1", "CE1", $niveau->id, $image,"Le cours élémentaire 1re année, également abrégé en CE1, est, en France, la deuxième classe de l'école élémentaire, après le cours préparatoire (CP). C'est la deuxième année du cycle 2. Il est suivi par le CE2, Cours élémentaire 2e année.");
        $image = ['name' => "ce2_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 28228];
        $this->createNew("Cours Elémentaire 2", "CE2", $niveau->id, $image,"Le cours élémentaire 2e année (CE2), ou troisième année du Cycle 2 ou cycle des apprentissages dit fondamentaux. En général, les élèves ont 8 ou 9 ans en fonction de leur date d'anniversaire. Ce cycle permet à l'élève de continuer à acquérir les bases d'une bonne et solide instruction : la maîtrise du langage et de la langue française, les mathématiques, l'éducation civique, l'éducation physique et l'éducation artistique. Suivi par le CM1, cours moyen 1re année.");
        $image = ['name' => "cm1_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 21263];
        $this->createNew("Cours Moyens 1", "CM1", $niveau->id, $image, "Le cours moyen 1re année (CM1), ou première année du cycle 3, est l'avant-dernier niveau (avant l'entrée au collège) de l'école primaire en France. Les enfants y accèdent au mois de septembre de l'année où ils fêtent leur neuvième anniversaire. L'âge typique des élèves durant cette année scolaire est donc de 8 à 10 ans. Suivi par le CM2, cours moyen 2e année.");
        $image = ['name' => "cm2_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 54980];
        $this->createNew("Cours Moyens 2", "CM2", $niveau->id, $image, "Le cours moyen 2e année (CM2), ou deuxième année du cycle 3, est la dernière année de l'école primaire en France. La dernière année du cycle 3 se poursuit en 6e, au collège. Les enfants y accèdent au mois de septembre de l'année où ils fêtent leur dixième anniversaire. L'âge typique des élèves durant cette année scolaire est donc de 9 à 11 ans.");

        $niveau = Niveau::where('intitule', "Collège")->first();
        $image = ['name' => "6e_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 44194];
        $this->createNew("Sixième", "6ème", $niveau->id, $image, "La classe de sixième est la première classe du collège. Elle est la dernière année du cycle 3. La classe de sixième est considérée comme un temps d’adaptation au collège.");
        $image = ['name' => "5e_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 91658];
        $this->createNew("Cinquième", "5ème", $niveau->id, $image, "La classe de cinquième est la deuxième classe du collège.");
        $image = ['name' => "4e_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 87922];
        $this->createNew("Quatrième", "4ème", $niveau->id, $image, "La classe de quatrième est la troisième classe du collège.");
        $image = ['name' => "3e_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 56712];
        $this->createNew("Troisième", "3ème", $niveau->id, $image, "La classe de troisième est la quatrième et dernière classe du collège.");

        $niveau = Niveau::where('intitule', "Lycée")->first();
        $image = ['name' => "2nd_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 14623];
        $this->createNew("Seconde", "2nd", $niveau->id, $image, "La classe de seconde est, la première des trois années du lycée. Les élèves y rentrent normalement l'année de leurs 15 ans (sauf ceux qui ont redoublé ou sauté une classe).");
        $image = ['name' => "1ere_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 37045];
        $this->createNew("Première", "1ère", $niveau->id, $image, "La classe de première est, la deuxième des trois années du lycée. Les élèves y rentrent normalement à l’âge de 16 ans (sauf redoublement, classe sautée ou naissance en début et fin d'année).");
        $image = ['name' => "tle_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 131885];
        $this->createNew("Terminale", "Tle", $niveau->id, $image, "La classe de terminale est, la troisième et dernière année du lycée (après la classe de première). Les élèves y entrent normalement à l'âge de 17 ans sauf cas particuliers (redoublement dans le cas d'élèves plus âgés, ou de classe sautée ou naissance en fin d'année dans le cas d'élèves plus jeunes).");

        $niveau = Niveau::where('intitule', "Supérieur")->first();
        $image = ['name' => "dts_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 103937];
        $this->createNew("Diplôme de Technicien Supérieur", "DTS", $niveau->id, $image, "Classe de préparation au Diplôme de Technicien Supérieur");
        $image = ['name' => "licence_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 46302];
        $this->createNew("Licence", "Licence", $niveau->id, $image, "Classe de préparation du Diplôme de Lience suivant le Système LMD.");
        $image = ['name' => "master_default.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 58412];
        $this->createNew("Master", "Master", $niveau->id, $image, "Classe de préparation du Diplôme de Master suivant le Système LMD.");
    }

    private function createNew($intitule, $sigle, $niveau_id, $image, $description = null)
    {
        $data = [
            'intitule' => $intitule, 'sigle' => $sigle, 'niveau_id' => $niveau_id
        ];
        if (!is_null($description)) {
            $data['description'] = $description;
        }
        $classe = Classe::create($data);

        File::create([
            'config_dir' => "classes_files_dir",
            'model_type' => "App\Models\Classe",
            'model_id' => $classe->id,
            'name' => $image['name'],
            'role' => "image_classe",
            'type' => $image['type'],
            'size' => $image['size'],
            'extension' => $image['extension'],
        ]);

        return $classe;
    }
}
