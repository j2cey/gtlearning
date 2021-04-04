<?php

namespace Database\Seeders;

use App\Models\Cours;
use App\Models\Auteur;
use App\Models\Classe;
use App\Models\Session;
use App\Models\Personne;
use App\Models\Chapitre;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création de personnes factices
        Personne::factory()
            ->times(20)
            ->create();

        // Création d'Auteurs factices
        $personnes = Personne::skip(10)->take(10)->get();

        foreach ($personnes as $personne) {
            Auteur::factory()
                ->for($personne)
                ->create();
        }

        $classes = Classe::get();

        foreach ($classes as $classe) {
            // nombre de cours
            $nombre_de_cours = rand(1,50);
            for ($c = 0; $c < $nombre_de_cours; $c++) {
                $this->creerCoursComplet($classe);
            }
        }
    }

    private function creerCoursComplet($classe) {
        // nombre de chapitres
        $nombre_de_chapitres = rand(1,5);
        // sessions
        $sessions_dispo_sur_vimeo = [
            ['lien' => "501103076", 'duree_mm' => 2, 'duree_ss' => 57 ],
            ['lien' => "499908635", 'duree_mm' => 2, 'duree_ss' => 50 ],
            ['lien' => "496843494", 'duree_mm' => 1, 'duree_ss' => 47 ],
            ['lien' => "496894990", 'duree_mm' => 1, 'duree_ss' => 30 ],
            ['lien' => "475930192", 'duree_mm' => 1, 'duree_ss' => 18 ],
            ['lien' => "495709328", 'duree_mm' => 1, 'duree_ss' => 20 ],
            ['lien' => "494532060", 'duree_mm' => 1, 'duree_ss' => 6 ],
            ['lien' => "487114118", 'duree_mm' => 2, 'duree_ss' => 0 ],
            ['lien' => "478169209", 'duree_mm' => 2, 'duree_ss' => 2 ],
            ['lien' => "145154480", 'duree_mm' => 1, 'duree_ss' => 9 ],
            ['lien' => "189642668", 'duree_mm' => 0, 'duree_ss' => 27 ],
            ['lien' => "191624680", 'duree_mm' => 1, 'duree_ss' => 19 ],
            ['lien' => "191209971", 'duree_mm' => 0, 'duree_ss' => 48 ],
            ['lien' => "183464304", 'duree_mm' => 2, 'duree_ss' => 0 ],
            ['lien' => "183513396", 'duree_mm' => 1, 'duree_ss' => 6 ],
            ['lien' => "181939352", 'duree_mm' => 1, 'duree_ss' => 20 ],
            ['lien' => "183124955", 'duree_mm' => 1, 'duree_ss' => 23 ],
            ['lien' => "182961717", 'duree_mm' => 1, 'duree_ss' => 28 ],
            ['lien' => "182887043", 'duree_mm' => 1, 'duree_ss' => 52 ],
            ['lien' => "157168824", 'duree_mm' => 1, 'duree_ss' => 30 ],
        ];

        $images_cours = [
            ['image' => "sharon-mccutcheon--juj1-lre5c-unsplash.jpg"],
            ['image' => "eric-rothermel-FoKO4DpXamQ-unsplash.jpg"]
        ];

        $auteur = Auteur::inRandomOrder()->first();

        $cours = Cours::factory()
            ->for($classe)
            ->create([
                'auteur_id' => $auteur->id
            ]);

        $chapitres = Chapitre::factory()
            ->count($nombre_de_chapitres)
            ->for($cours)
            ->create();

        foreach ($chapitres as $chapitre) {
            $nombre_de_session = rand(1, count($sessions_dispo_sur_vimeo));
            for ($i = 0; $i < $nombre_de_session; $i++) {
                $session = $sessions_dispo_sur_vimeo[rand(0, count($sessions_dispo_sur_vimeo) - 1)];

                Session::factory()
                    ->for($chapitre)
                    ->create(
                        [
                            'lien'=>$session['lien'],
                            'posi'=>$i,
                            'duree_mm'=>$session['duree_mm'],
                            'duree_ss'=>$session['duree_ss'],
                        ]
                    );
            }
        }
    }
}
