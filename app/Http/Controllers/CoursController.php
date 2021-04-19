<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Classe;
use App\Models\Auteur;
use Illuminate\Http\Request;
use App\Http\Requests\Cours\UpdateCoursRequest;
use App\Http\Requests\Cours\CreateCoursRequest;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recherche_cols = ['id', 'intitulé', 'description'];

        $sortBy = 'id';
        $orderBy = 'asc';
        $perPage = 5;
        $q = null;
        if ($request->has('orderBy')) $orderBy = $request->query('orderBy');
        if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if ($request->has('perPage')) $perPage = $request->query('perPage');
        if ($request->has('q')) $q = $request->query('q');

        $cours = Cours::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);

        return view('cours.index', compact('cours', 'recherche_cols', 'orderBy', 'sortBy', 'q', 'perPage'));
    }

    public function getByClasse(Request $request, $classeid) {

        $recherche_cols = ['id', 'intitulé', 'description'];

        $sortBy = 'id';
        $orderBy = 'asc';
        $perPage = 5;
        $q = null;
        if ($request->has('orderBy')) $orderBy = $request->query('orderBy');
        if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if ($request->has('perPage')) $perPage = $request->query('perPage');
        if ($request->has('q')) $q = $request->query('q');

        $classe = Classe::where('id', $classeid)->first();
        //$cours = Cours::where('classe_id', $classeid)->paginate($perPage);
        $cours = Cours::search($q)->where('classe_id', $classeid)->orderBy($sortBy, $orderBy)->paginate($perPage);

        return view('cours.byclasse', compact('classe','cours', 'recherche_cols', 'orderBy', 'sortBy', 'q', 'perPage'));

        /*return view('cours.byclasse')
            ->with('classe', $classe)
            ->with('cours', $cours);*/
    }

    public function getByAuteur(Request $request, $auteurid) {

        $recherche_cols = ['id', 'intitulé', 'description'];

        $sortBy = 'id';
        $orderBy = 'asc';
        $perPage = 5;
        $q = null;
        if ($request->has('orderBy')) $orderBy = $request->query('orderBy');
        if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if ($request->has('perPage')) $perPage = $request->query('perPage');
        if ($request->has('q')) $q = $request->query('q');

        $auteur = Auteur::where('id', $auteurid)->first();
        //$cours = Cours::where('auteur_id', $auteurid)->paginate($perPage);
        $cours = Cours::search($q)->where('auteur_id', $auteurid)->orderBy($sortBy, $orderBy)->paginate($perPage);

        return view('cours.byauteur', compact('auteur','cours', 'recherche_cols', 'orderBy', 'sortBy', 'q', 'perPage'));
    }

    public function lecture($coursid) {
        $cours = Cours::where('id', $coursid)->first();
        return view('cours.lecture', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auteurs = Auteur::with('personne')->get()->pluck('personne.nomComplet', 'id');
        $classes = Classe::get()->pluck('intitule', 'id');
        return view('cours.create', compact('auteurs','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCoursRequest $request
     * @return Cours
     */
    public function store(CreateCoursRequest $request)
    {
        $auteur = json_decode($request->auteur);
        $classe = json_decode($request->classe);

        $new_cours = new Cours();
        $new_cours->intitule = $request->intitule;
        $new_cours->description = $request->description;
        $new_cours->save();

        $new_cours->setAuteur($auteur->id);
        $new_cours->setClasse($classe->id);

        $new_cours->setImagecours($request,"imagecours_file");

        return $new_cours;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cours  $cour
     * @return \Illuminate\Http\Response
     */
    public function show(Cours $cour)
    {
        //
    }

    public function getById($id) {
        $cours = Cours::where('id', $id)->first();
        return $cours->load('chapitres');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cours $cour
     * @return \Illuminate\Http\Response
     */
    public function edit(Cours $cour)
    {
        return view('cours.edit', compact('cour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCoursRequest $request
     * @param \App\Models\Cours $cour
     * @return void
     */
    public function update(UpdateCoursRequest $request, Cours $cour)
    {
        $auteur = json_decode($request->auteur);
        $classe = json_decode($request->classe);

        $cour->intitule = $request->intitule;
        $cour->description = $request->description;
        $cour->save();

        $cour->setAuteur($auteur->id);
        $cour->setClasse($classe->id);

        $cour->verifyAndStoreFile($request,"imagecours_file", "image_cours", "cours_files_dir", $cour->imagecours);

        return $cour;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cours  $cour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cour)
    {
        $cour->load('imagecours');
        $cour->delete();

        return response()->json(['status' => 'ok'], 200);
    }
}
