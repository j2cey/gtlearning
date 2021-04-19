<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Niveau;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $niveaux = Niveau::get();
        $cours = Cours::orderBy('id', 'desc')->skip(0)->take(10)->get();

        return view('home')
            ->with('niveaux', $niveaux)
            ->with('cours', $cours);
    }
}
