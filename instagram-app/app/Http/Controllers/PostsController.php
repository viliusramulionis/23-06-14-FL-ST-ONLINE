<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Post::all();
        } catch(\Throwable $e) {
            return response('Įvyko klaida', 500);
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
}
