<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicaController;

//Artistas
Route::get('/artistas', [ArtistaController::class,'index'])->name('artistas.index')->middleware(['auth', 'verified']);
Route::get('/artistas/create', [ArtistaController::class,'create'])->name('artistas.create')->middleware(['auth', 'verified']);
Route::post('/artistas', [ArtistaController::class,'store'])->name('artistas.store')->middleware(['auth', 'verified']);
Route::get('/artistas{artista}', [ArtistaController::class,'show'])->name('artistas.show')->middleware(['auth', 'verified']);
Route::get('/artistas/{artista}/edit', [ArtistaController::class,'edit'])->name('artistas.edit')->middleware(['auth', 'verified']);
Route::put('/artistas/{artista}', [ArtistaController::class,'update'])->name('artistas.update')->middleware(['auth', 'verified']);
Route::delete('/artistas/{artista}', [ArtistaController::class,'destroy'])->name('artistas.destroy')->middleware(['auth', 'verified']);

//Gêneros
Route::get('/generos', [GeneroController::class,'index'])->name('generos.index')->middleware(['auth', 'verified']);
Route::get('/generos/create', [GeneroController::class,'create'])->name('generos.create')->middleware(['auth', 'verified']);
Route::post('/generos', [GeneroController::class,'store'])->name('generos.store')->middleware(['auth', 'verified']);
Route::get('/generos{genero}', [GeneroController::class,'show'])->name('generos.show')->middleware(['auth', 'verified']);
Route::get('/generos/{genero}/edit', [GeneroController::class,'edit'])->name('generos.edit')->middleware(['auth', 'verified']);
Route::put('/generos/{genero}', [GeneroController::class,'update'])->name('generos.update')->middleware(['auth', 'verified']);
Route::delete('/generos/{genero}', [GeneroController::class,'destroy'])->name('generos.destroy')->middleware(['auth', 'verified']);

//Álbuns
Route::get('/albuns', [AlbumController::class,'index'])->name('albuns.index')->middleware(['auth', 'verified']);
Route::get('/albuns/create', [AlbumController::class,'create'])->name('albuns.create')->middleware(['auth', 'verified']);
Route::post('/albuns', [AlbumController::class,'store'])->name('albuns.store')->middleware(['auth', 'verified']);
Route::get('/albuns{album}', [AlbumController::class,'show'])->name('albuns.show')->middleware(['auth', 'verified']);
Route::get('/albuns/{album}/edit', [AlbumController::class,'edit'])->name('albuns.edit')->middleware(['auth', 'verified']);
Route::put('/albuns/{album}', [AlbumController::class,'update'])->name('albuns.update')->middleware(['auth', 'verified']);
Route::delete('/albuns/{album}', [AlbumController::class,'destroy'])->name('albuns.destroy')->middleware(['auth', 'verified']);

//Músicas
Route::get('/musicas', [MusicaController::class,'index'])->name('musicas.index')->middleware(['auth', 'verified']);
Route::get('/musicas/create', [MusicaController::class,'create'])->name('musicas.create')->middleware(['auth', 'verified']);
Route::post('/musicas', [MusicaController::class,'store'])->name('musicas.store')->middleware(['auth', 'verified']);
Route::get('/musicas{musica}', [MusicaController::class,'show'])->name('musicas.show')->middleware(['auth', 'verified']);
Route::get('/musicas/{musica}/edit', [MusicaController::class,'edit'])->name('musicas.edit')->middleware(['auth', 'verified']);
Route::put('/musicas/{musica}', [MusicaController::class,'update'])->name('musicas.update')->middleware(['auth', 'verified']);
Route::delete('/musicas/{musica}', [MusicaController::class,'destroy'])->name('musicas.destroy')->middleware(['auth', 'verified']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
