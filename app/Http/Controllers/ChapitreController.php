<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_chapitre = new Chapitre();
        $new_chapitre->intitule = $request->intitule;
        $new_chapitre->description = $request->description;
        $new_chapitre->save();

        $new_chapitre->setCours($request->cour_id);

        return $new_chapitre;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function show(Chapitre $chapitre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapitre $chapitre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapitre $chapitre)
    {
        $chapitre->intitule = $request->intitule;
        $chapitre->description = $request->description;
        $chapitre->save();

        return $chapitre;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapitre $chapitre)
    {
        $chapitre->delete();

        return response()->json(['status' => 'ok'], 200);
    }
}
