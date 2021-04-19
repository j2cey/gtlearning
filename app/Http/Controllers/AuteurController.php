<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Auteur\CreateAuteurRequest;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recherche_cols = ['id', 'nom', 'description'];

        $sortBy = 'id';
        $orderBy = 'asc';
        $perPage = 5;
        $q = null;
        if ($request->has('orderBy')) $orderBy = $request->query('orderBy');
        if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if ($request->has('perPage')) $perPage = $request->query('perPage');
        if ($request->has('q')) $q = $request->query('q');

        //$auteurs = Auteur::paginate($perPage);
        $auteurs = Auteur::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);

        return view('auteurs.index', compact('auteurs', 'recherche_cols', 'orderBy', 'sortBy', 'q', 'perPage'));
    }

    public function fetch() {
        $auteurs = Auteur::get();

        /*$auteurs = DB::table('auteurs')
            ->join('personnes', 'personnes.id', '=', 'auteurs.personne_id')
            ->select('auteurs.*', 'personnes.nom', 'personnes.prenom')
            ->get();*/

        return $auteurs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAuteurRequest $request
     * @return void
     */
    public function store(CreateAuteurRequest $request)
    {
        $personne = Personne::create([
            'email' => $request->email,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'fonction' => $request->fonction,
        ]);

        $auteur = Auteur::create([
            'resume' => $request->resume,
        ]);

        $auteur->personne()->associate($personne);
        $auteur->save();
        $auteur->setImageauteur($request,"imageauteur_file");

        return $auteur;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function show(Auteur $auteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Auteur $auteur)
    {
        return view('auteurs.edit', compact('auteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auteur $auteur)
    {
        $auteur->personne->email = $request->email;
        $auteur->personne->nom = $request->nom;
        $auteur->personne->prenom = $request->prenom;
        $auteur->personne->telephone = $request->telephone;
        $auteur->personne->fonction = $request->fonction;

        $auteur->resume = $request->resume;
        $auteur->push();

        $auteur->setImageauteur($request,"imageauteur_file");

        return $auteur;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auteur $auteur)
    {
        $auteur->load('cours');
        try {
            if ($auteur->cours->count() > 0) {
                return response()->json(['status' => 'ko', 'message' => "Cet Auteur a des cours et ne peut être supprimé"], 200);
            } else {
                $del_resp = $auteur->delete();
                return response()->json(['status' => 'ok', 'message' => "Auteur supprimé avec succès"], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 422);
        }
    }
}
