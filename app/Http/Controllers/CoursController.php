<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Classe;
use App\Models\Auteur;
use Illuminate\Http\Request;

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

        $cours = Cours::paginate($perPage);

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
        $cours = Cours::where('classe_id', $classeid)->paginate($perPage);

        return view('cours.byclasse', compact('classe','cours', 'recherche_cols', 'orderBy', 'sortBy', 'q', 'perPage'));

        /*return view('cours.byclasse')
            ->with('classe', $classe)
            ->with('cours', $cours);*/
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auteur = json_decode($request->auteur);
        $classe = json_decode($request->classe);

        $new_cours = new Cours();
        $new_cours->intitule = $request->intitule;
        $new_cours->description = $request->description;
        $new_cours->save();

        $new_cours->setAuteur($auteur->id);
        $new_cours->setClasse($classe->id);

        $new_cours->verifyAndStoreImage($request,"image", "image", "cours_files_dir");

        return $new_cours;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function show(Cours $cours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function edit(Cours $cours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cours $cours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cours)
    {
        //
    }
}
