<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Post::with('likes')->with('comments')->get();

            return $data;
        } catch(\Throwable $e) {
            echo $e->getMessage();
            //return response('Įvyko klaida', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        try {
            Post::create($request->all());
            return 'Viskas pavyko';
        } catch(\Throwable $e) {
            return response('Įvyko klaida', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return Post::find($id);
        } catch(\Throwable $e) {
            return response('Įvyko klaida', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Post::find($id)->update($request->all());
            return 'Viskas pavyko';
        } catch(\Throwable $e) {
            return response('Įvyko klaida', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Post::find($id)->delete();
            return 'Viskas pavyko';
        } catch(\Throwable $e) {
            return response('Įvyko klaida', 500);
        }
    }

    // Naujo komentaro pridėjimas
    public function comment(
        string $id,
        Request $request
    ) {
        try {
            Comment::create([
                'user_id' => 1,
                'post_id' => $id,
                'text' => $request->text
            ]);
        } catch(\Throwable $e) {
            return response('Įvyko klaida', 500);
        }
    }


    // Naujo laiko pridėjimas
    public function like( string $id ) {
        try {
            Like::create([
                'user_id' => 1,
                'post_id' => $id
            ]);
        } catch(\Throwable $e) {
            echo $e->getMessage();
            return response('Įvyko klaida', 500);
        }
    }
}
