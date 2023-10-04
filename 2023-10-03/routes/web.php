<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//https://domenas.lt/?page=titulinis&action=edit
//https://domenas.lt/titulinis/edit

Route::get('/', function () {
    return view('titulinis', [
        'vardas' => 'Vilius',
        'amzius' => rand(1, 100)
    ]);
});

Route::get('/apie-mus', function () {
    return view('apie-mus',
    [
        'pavadinimas' => 'Labai šauni parduotuvė',
        'adresas' => false,
        'salis' => '',
        'kolektyvas' => ['Jonas Jonaitis', 'Petras Petraitis', 'Darius Daraitis']
    ]);
});

// Route::get();
// Route::post();
// Route::put();
// Route::delete();
// Route::patch();
// Route::options();
