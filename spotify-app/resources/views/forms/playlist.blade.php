@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST">
        <div class="mb-3">
            <label>Playlist name:</label>
            <input type="text" name="name" placeholder="Very cool songs" class="form-control">
        </div>
        @foreach($data as $song)
            <div class="mb-2">
                <label>
                    <input type="checkbox" name="songs[]" value="{{$song->id}}">
                    {{$song->name}}
                </label>
            </div>
        @endforeach
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection