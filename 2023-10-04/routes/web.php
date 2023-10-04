<?php

use Illuminate\Support\Facades\Route;
use App\Models\Song;
//Uzklausos informacijai gauti
use Illuminate\Http\Request;
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

//CRUD:
//REST API STRUKTŪRA
//CREATE - POST
//READ - GET
//UPDATE - PUT
//DELETE - DELETE

Route::get('/', function () {
    echo '<pre>';
    //Visos dainos
    foreach(Song::all() as $data) {
        echo $data->name;
    }

    //Visos dainos kaip masyvas
    // print_r(Song::all()->toArray());
    // return view('welcome');
});

Route::get('/2', function() {
    //Irašo paieška pagal id
    $song = Song::find(2);
    
    echo "<li>$song->name</li>";
    echo "<li>$song->author</li>";
    echo "<li>$song->link</li>";
});

Route::get('/where', function() {
    //Norint susirasti visus rezultatus
    $data = Song::where('author', 'Rick Astley')->get();

    echo '<h2>Visi rezultatai</h2>';

    foreach($data as $song) {
        echo "<li>$song->name</li>";
        echo "<li>$song->author</li>";
        echo "<li>$song->link</li>";
    }

    //Norint susigrąžinti patį pirmą rezultatą
    $song = Song::where('author', 'Rick Astley')->first();

    echo '<h2>Pirmas rezultatas</h2>';

    echo "<li>$song->name</li>";
    echo "<li>$song->author</li>";
    echo "<li>$song->link</li>";
});

Route::get('/or-where', function() {
    $data = Song::where('author', 'Rick Astley')
                ->orWhere('name', 'Baby Mandala')
                ->get();

    echo '<h2>Visi rezultatai</h2>';

    foreach($data as $song) {
        echo "<li>$song->name</li>";
        echo "<li>$song->author</li>";
        echo "<li>$song->link</li>";
    }
});

Route::get('/and-where', function() {
    $data = Song::where('author', 'Rick Astley')
                ->where('name', 'Never gonna give you up')
                ->get();

    echo '<h2>Visi rezultatai</h2>';

    foreach($data as $song) {
        echo "<li>$song->name</li>";
        echo "<li>$song->author</li>";
        echo "<li>$song->link</li>";
    }
});

Route::get('/form', function() {
    return view('form');
});

Route::post('/new-song', function(Request $uzklausa) {
    // print_r($uzklausa->toArray());
    
    //Pirmas įrašo išssaugojimo būdas:
    // $song = new Song;
    // $song->name = 'Test';
    // $song->author = 'Testas';
    // $song->link = 'http://test';
    // $song->save();

    //Antras įrašo išsaugojimas
    // $song = Song::create([
    //     'name' => 'Nemylėjau tavęs',
    //     'author' => 'Džordana Butkutė',
    //     'link' => 'https://spotify.com'
    // ]);

    //Pridėto įrašo id grąžinimas
    // echo $song->id;

    //Uzklausos duomenu konvertavimas i masyva:
    // ->all()
    // ->toArray()
    
    $song = Song::create($uzklausa->all());
});