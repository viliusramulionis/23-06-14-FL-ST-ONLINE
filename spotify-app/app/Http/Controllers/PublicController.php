<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = \App\Models\Playlist::all();

        return view('home', ['data' => $data]);
    }

    public function single($id) {
        $playlist = \App\Models\Playlist::find($id);
        $playlist->songs;
        // dd($playlist->toArray());
        return view('playlist', ['data' => $playlist->toArray()]);
    }

    public function newPlaylist() {
        $data = \App\Models\Song::all();
        return view('forms.playlist', ['data' => $data]);
    }

    public function savePlaylist(Request $request) {
        $validated = $request->validate([
            // 'name' => ['required', 'min:3', 'max:200']
            'name' => 'required|min:3|max:200',
            'songs' => 'required'
        ]);

        if(!$validated['name'])
            return 'Žinutė';

        $playlist = \App\Models\Playlist::create($validated);

        // foreach($validated['songs'] as $songId) {
        //     $song = \App\Models\Song::find($songId);
        //     $song->playlist_id = $playlist->id;
        //     $song->save();
        // }

        // UPDATE `songs` SET `playlist_id`= 6 WHERE id IN(41, 42, 43);
        \App\Models\Song::whereIn('id', $validated['songs'])
                        ->update(['playlist_id' => $playlist->id]);
    }
}
