@extends('layouts.card')

@section('card-header')
    Dashboard
@endsection

@section('card-content')

<!-- TODO: Add place for uncatalogued bookmarks -->

<!-- TODO: Add messaging if there are no bookmarks -->

@foreach (Auth::user()->catalogues as $catalogue)

    <h4>{{ $catalogue->name }}</h4>
    <ul>
@foreach ($catalogue->bookmarks as $bookmark)
        <li><a href="{{ $bookmark->url }}" target=_blank>{{ $bookmark->name ? $bookmark->name : $bookmark->url }}</a></li>
@endforeach
    </ul>

@endforeach

@endsection
