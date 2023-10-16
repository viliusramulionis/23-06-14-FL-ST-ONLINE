<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivateController extends Controller
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

    public function newSong() {
        return view('forms.song');
    }

    public function saveSong(Request $request) {
        $validated = $request->validate([
            // 'name' => ['required', 'min:3', 'max:200']
            'name' => 'required|min:3|max:200',
            'artist' => 'required',
            'year' => 'required|integer',
            'album' => 'required',
            'file' => 'required|max:30000|mimes:mp3',
            'photo' => 'required|max:10000|mimes:jpg,png'
        ]);

        $validated['file'] = $request->file('file')->store('songs');
        $validated['photo'] = $request->file('photo')->store('photos');
        $validated['user_id'] = auth()->user()->id;

        \App\Models\Song::create($validated);
    }
}
