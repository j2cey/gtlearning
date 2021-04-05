<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ChapitreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('home');
});*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('niveaux', NiveauController::class);
Route::get('niveaux.byid/{id}', [NiveauController::class, 'getById'])->name('niveaux.byid');

Route::resource('classes', ClasseController::class);
Route::get('classes.softget', [ClasseController::class, 'softget'])->name('classes.softget');
Route::get('classes.fetch', [ClasseController::class, 'fetch'])->name('classes.fetch');

Route::resource('cours', CoursController::class);
Route::get('cours.byclasse/{classeid}', [CoursController::class, 'getByClasse'])->name('cours.byclasse');
Route::get('cours.lecture/{coursid}', [CoursController::class, 'lecture'])->name('cours.lecture');

Route::resource('chapitres', ChapitreController::class);

Route::resource('sessions', SessionController::class);
Route::get('sessions.byid/{id}', [SessionController::class, 'getById']);

Route::resource('auteurs', AuteurController::class);
Route::get('auteurs.fetch', [AuteurController::class, 'fetch'])->name('auteurs.fetch');
