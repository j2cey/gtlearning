<?php

namespace Database\Seeders;

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
        $this->createNew("Cours Préparatoire 1", "CP 1", $niveau->id, "cp_default.jpg", "Première classe de l'école élémentaire française, le cours préparatoire, en abrégé « CP », est la première année d'instruction obligatoire en France, durant laquelle se poursuit l'apprentissage de la lecture, qui est commencé en maternelle, éventuellement au jardin d'enfant ou garde à domicile, car avant le 1er septembre 2019 la maternelle n'était pas obligatoire.");
        $this->createNew("Cours Préparatoire 2", "CP 2", $niveau->id, "cp2_default.jpg", "Première classe de l'école élémentaire française, le cours préparatoire, en abrégé « CP », est la première année d'instruction obligatoire en France, durant laquelle se poursuit l'apprentissage de la lecture, qui est commencé en maternelle, éventuellement au jardin d'enfant ou garde à domicile, car avant le 1er septembre 2019 la maternelle n'était pas obligatoire.");
        $this->createNew("Cours Elémentaire 1", "CE1", $niveau->id, "ce1_default.jpg","Le cours élémentaire 1re année, également abrégé en CE1, est, en France, la deuxième classe de l'école élémentaire, après le cours préparatoire (CP). C'est la deuxième année du cycle 2. Il est suivi par le CE2, Cours élémentaire 2e année.");
        $this->createNew("Cours Elémentaire 2", "CE2", $niveau->id, "ce2_default.jpg","Le cours élémentaire 2e année (CE2), ou troisième année du Cycle 2 ou cycle des apprentissages dit fondamentaux. En général, les élèves ont 8 ou 9 ans en fonction de leur date d'anniversaire. Ce cycle permet à l'élève de continuer à acquérir les bases d'une bonne et solide instruction : la maîtrise du langage et de la langue française, les mathématiques, l'éducation civique, l'éducation physique et l'éducation artistique. Suivi par le CM1, cours moyen 1re année.");
        $this->createNew("Cours Moyens 1", "CM1", $niveau->id, "cm1_default.jpg", "Le cours moyen 1re année (CM1), ou première année du cycle 3, est l'avant-dernier niveau (avant l'entrée au collège) de l'école primaire en France. Les enfants y accèdent au mois de septembre de l'année où ils fêtent leur neuvième anniversaire. L'âge typique des élèves durant cette année scolaire est donc de 8 à 10 ans. Suivi par le CM2, cours moyen 2e année.");
        $this->createNew("Cours Moyens 2", "CM2", $niveau->id, "cm2_default.jpg", "Le cours moyen 2e année (CM2), ou deuxième année du cycle 3, est la dernière année de l'école primaire en France. La dernière année du cycle 3 se poursuit en 6e, au collège. Les enfants y accèdent au mois de septembre de l'année où ils fêtent leur dixième anniversaire. L'âge typique des élèves durant cette année scolaire est donc de 9 à 11 ans.");

        $niveau = Niveau::where('intitule', "Collège")->first();
        $this->createNew("Sixième", "6ème", $niveau->id, "6e_default.jpg", "La classe de sixième est la première classe du collège. Elle est la dernière année du cycle 3. La classe de sixième est considérée comme un temps d’adaptation au collège.");
        $this->createNew("Cinquième", "5ème", $niveau->id, "5e_default.jpg", "La classe de cinquième est la deuxième classe du collège.");
        $this->createNew("Quatrième", "4ème", $niveau->id, "4e_default.jpg", "La classe de quatrième est la troisième classe du collège.");
        $this->createNew("Troisième", "3ème", $niveau->id, "3e_default.jpg", "La classe de troisième est la quatrième et dernière classe du collège.");

        $niveau = Niveau::where('intitule', "Lycée")->first();
        $this->createNew("Seconde", "2nd", $niveau->id, "2nd_default.jpg", "La classe de seconde est, la première des trois années du lycée. Les élèves y rentrent normalement l'année de leurs 15 ans (sauf ceux qui ont redoublé ou sauté une classe).");
        $this->createNew("Première", "1ère", $niveau->id, "1ere_default.jpg", "La classe de première est, la deuxième des trois années du lycée. Les élèves y rentrent normalement à l’âge de 16 ans (sauf redoublement, classe sautée ou naissance en début et fin d'année).");
        $this->createNew("Terminale", "Tle", $niveau->id, "tle_default.jpg", "La classe de terminale est, la troisième et dernière année du lycée (après la classe de première). Les élèves y entrent normalement à l'âge de 17 ans sauf cas particuliers (redoublement dans le cas d'élèves plus âgés, ou de classe sautée ou naissance en fin d'année dans le cas d'élèves plus jeunes).");

        $niveau = Niveau::where('intitule', "Supérieur")->first();
        $this->createNew("Diplôme de Technicien Supérieur", "DTS", $niveau->id, "dts_default.jpg", "Classe de préparation au Diplôme de Technicien Supérieur");
        $this->createNew("Licence", "Licence", $niveau->id, "licence_default.jpg", "Classe de préparation du Diplôme de Lience suivant le Système LMD.");
        $this->createNew("Master", "Master", $niveau->id, "master_default.jpg", "Classe de préparation du Diplôme de Master suivant le Système LMD.");
    }

    private function createNew($intitule, $sigle, $niveau_id, $image, $description = null)
    {
        $data = [
            'intitule' => $intitule, 'sigle' => $sigle, 'niveau_id' => $niveau_id, 'image' => $image
        ];
        if (!is_null($description)) {
            $data['description'] = $description;
        }
        return Classe::create($data);
    }
}
