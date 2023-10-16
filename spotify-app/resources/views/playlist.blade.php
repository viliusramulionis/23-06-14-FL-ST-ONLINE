@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$data['name']}}</div>

                <div class="card-body">
                    @foreach($data['songs'] as $song) 
                        <ul>
                            <img src="/{{$song['photo']}}" alt="{{$song['name']}}" />
                            <li>Name: {{$song['name']}}</li>
                            <li>Album: {{$song['album']}}</li>
                            <li>Artist: {{$song['artist']}}</li>
                            <li>Year: {{$song['year']}}</li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
