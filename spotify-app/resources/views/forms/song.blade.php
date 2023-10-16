@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Song name:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Artist name:</label>
            <input type="text" name="artist" class="form-control">
        </div>
        <div class="mb-3">
            <label>Album:</label>
            <input type="text" name="album" class="form-control">
        </div>
        <div class="mb-3">
            <label>Year:</label>
            <input type="number" name="year" class="form-control">
        </div>
        <div class="mb-3">
            <label>File:</label>
            <input type="file" name="file" class="form-control">
        </div>
        <div class="mb-3">
            <label>Photo:</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection