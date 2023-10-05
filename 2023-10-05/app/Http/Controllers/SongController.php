<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    public function index() {
        echo '<pre>';
        //Visos dainos
        foreach(Song::all() as $data) {
            echo $data->name;
        }
    
        //Visos dainos kaip masyvas
        // print_r(Song::all()->toArray());
        // return view('welcome');
    }

    public function singleSong() {
        //Irašo paieška pagal id
        $song = Song::find(2);
        
        echo "<li>$song->name</li>";
        echo "<li>$song->author</li>";
        echo "<li>$song->link</li>";
    }

    public function where() {
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
    }

    public function orWhere() {
        $data = Song::where('author', 'Rick Astley')
                    ->orWhere('name', 'Baby Mandala')
                    ->get();
    
        echo '<h2>Visi rezultatai</h2>';
    
        foreach($data as $song) {
            echo "<li>$song->name</li>";
            echo "<li>$song->author</li>";
            echo "<li>$song->link</li>";
        }
    }

    public function andWhere() {
        $data = Song::where('author', 'Rick Astley')
                    ->where('name', 'Never gonna give you up')
                    ->get();
    
        echo '<h2>Visi rezultatai</h2>';
    
        foreach($data as $song) {
            echo "<li>$song->name</li>";
            echo "<li>$song->author</li>";
            echo "<li>$song->link</li>";
        }
    }

    public function newForm() {
        return view('form');
    }

    public function saveNew(Request $uzklausa) {
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
    }
    
    public function editForm(int $id) {
        return view('form');
    }

    public function saveEdit (
        int $id, 
        Request $request
    ) {
        // Redagavimo šablonas
        // $song = Song::find(6);
        // $song->name = 'Angelai';
        // $song->author = 'Bavarija';
        // $song->save();
    
        //Mass Update 
        try {
            Song::find($id)->update($request->all());
        } catch(\Exception $e) {
            //Atvaizduojama žinutė
        }
    }

    public function delete(int $id) {
        Song::find($id)->delete();
        // Ištrinti viską iš lentelės:
        // Song::truncate();
    }
}
