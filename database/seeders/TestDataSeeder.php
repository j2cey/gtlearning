<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Cours;
use App\Models\Video;
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
        $videos_dispo_sur_vimeo = [
            ['id_video' => "501103076", 'uri' => "/videos/501103076", 'duree_secs' => 177, 'duree_mm' => 2, 'duree_ss' => 57 ],
            ['id_video' => "499908635", 'uri' => "/videos/499908635", 'duree_secs' => 170, 'duree_mm' => 2, 'duree_ss' => 50 ],
            ['id_video' => "496843494", 'uri' => "/videos/496843494", 'duree_secs' => 107, 'duree_mm' => 1, 'duree_ss' => 47 ],
            ['id_video' => "496894990", 'uri' => "/videos/496894990", 'duree_secs' => 90, 'duree_mm' => 1, 'duree_ss' => 30 ],
            ['id_video' => "475930192", 'uri' => "/videos/475930192", 'duree_secs' => 78, 'duree_mm' => 1, 'duree_ss' => 18 ],
            ['id_video' => "495709328", 'uri' => "/videos/495709328", 'duree_secs' => 80, 'duree_mm' => 1, 'duree_ss' => 20 ],
            ['id_video' => "494532060", 'uri' => "/videos/494532060", 'duree_secs' => 66, 'duree_mm' => 1, 'duree_ss' => 6 ],
            ['id_video' => "487114118", 'uri' => "/videos/487114118", 'duree_secs' => 120, 'duree_mm' => 2, 'duree_ss' => 0 ],
            ['id_video' => "478169209", 'uri' => "/videos/478169209", 'duree_secs' => 122, 'duree_mm' => 2, 'duree_ss' => 2 ],
            ['id_video' => "145154480", 'uri' => "/videos/145154480", 'duree_secs' => 69, 'duree_mm' => 1, 'duree_ss' => 9 ],
            ['id_video' => "189642668", 'uri' => "/videos/189642668", 'duree_secs' => 27, 'duree_mm' => 0, 'duree_ss' => 27 ],
            ['id_video' => "191624680", 'uri' => "/videos/191624680", 'duree_secs' => 79, 'duree_mm' => 1, 'duree_ss' => 19 ],
            ['id_video' => "191209971", 'uri' => "/videos/191209971", 'duree_secs' => 48, 'duree_mm' => 0, 'duree_ss' => 48 ],
            ['id_video' => "183464304", 'uri' => "/videos/183464304", 'duree_secs' => 120, 'duree_mm' => 2, 'duree_ss' => 0 ],
            ['id_video' => "183513396", 'uri' => "/videos/183513396", 'duree_secs' => 66, 'duree_mm' => 1, 'duree_ss' => 6 ],
            ['id_video' => "181939352", 'uri' => "/videos/181939352", 'duree_secs' => 80, 'duree_mm' => 1, 'duree_ss' => 20 ],
            ['id_video' => "183124955", 'uri' => "/videos/183124955", 'duree_secs' => 83, 'duree_mm' => 1, 'duree_ss' => 23 ],
            ['id_video' => "182961717", 'uri' => "/videos/182961717", 'duree_secs' => 88, 'duree_mm' => 1, 'duree_ss' => 28 ],
            ['id_video' => "182887043", 'uri' => "/videos/182887043", 'duree_secs' => 112, 'duree_mm' => 1, 'duree_ss' => 52 ],
            ['id_video' => "157168824", 'uri' => "/videos/157168824", 'duree_secs' => 90, 'duree_mm' => 1, 'duree_ss' => 30 ],
        ];

        $images_cours = [
            ['name' => "sharon-mccutcheon--juj1-lre5c-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 374109],
            ['name' => "eric-rothermel-FoKO4DpXamQ-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 221823],
            ['name' => "david-travis-5bYxXawHOQg-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 152126],
            ['name' => "nick-morrison-FHnnjk1Yj7Y-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 231769],
            ['name' => "lewis-keegan-XUXfZY4dOT4-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 327848],
            ['name' => "martin-adams-_OZCl4XcpRw-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 524560],
            ['name' => "kimberly-farmer-lUaaKCUANVI-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 175913],
            ['name' => "haseeb-modi-CoVhe91yY0E-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 255846],
            ['name' => "blaire-harmon-JxA_GYxdwOA-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 258746],
            ['name' => "mwesigwa-joel-jHvedTh-avo-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 244342],
            ['name' => "angelina-litvin-K3uOmmlQmOo-unsplash.jpg", 'type' => "image/jpeg", 'extension' => "jpg", 'size' => 185915],
        ];

        $image = $images_cours[rand(0, count($images_cours) - 1)];

        $auteur = Auteur::inRandomOrder()->first();

        $cours = Cours::factory()
            ->for($classe)
            ->create([
                'auteur_id' => $auteur->id
            ]);

        File::create([
            'config_dir' => "cours_files_dir",
            'model_type' => "App\Models\Cours",
            'model_id' => $cours['id'],
            'name' => $image['name'],
            'role' => "image_cours",
            'type' => $image['type'],
            'size' => $image['size'],
            'extension' => $image['extension'],
        ]);

        $chapitres = Chapitre::factory()
            ->count($nombre_de_chapitres)
            ->for($cours)
            ->create();

        foreach ($chapitres as $chapitre) {
            $nombre_de_session = rand(1,5);
            for ($i = 0; $i < $nombre_de_session; $i++) {
                $video = $videos_dispo_sur_vimeo[rand(0, count($videos_dispo_sur_vimeo) - 1)];

                $session = Session::factory()
                    ->for($chapitre)
                    ->create(
                        [
                            'posi'=>$i
                        ]
                    );
                Video::create([
                    'model_type' => "App\Models\Session",
                    'model_id' => $session['id'],
                    'name' => $session['intitule'],
                    'role' => "video_session",
                    'video_id'=>$video['id_video'],
                    'video_uri'=>$video['uri'],
                    'duration_secs'=>$video['duree_secs'],
                    'duration_mm'=>$video['duree_mm'],
                    'duration_ss'=>$video['duree_ss'],
                ]);
            }
        }
    }
}
