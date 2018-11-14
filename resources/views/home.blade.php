@extends('layouts.card')

@section('card-header')
    Dashboard
@endsection

@section('card-content')

@if (Auth::user()->bookmarks->count() == 0)

    <p>This is your dashboard - a quick view of the bookmarks you've saved.</p>

    <p>Add new bookmarks by opening the user dropdown menu and selecting "My Bookmarks." Then click "New Bookmark" to display the new bookmark form.</p>

@else

    <div class="clearfix">
        <span class="ml-2 badge badge-warning">{{ Auth::user()->uncatalogued_bookmarks()->count() }}</span><h4 class="float-left"><a class="text-secondary" data-toggle="collapse" href="#catalogueless">Uncatalogued</a></h4>
    </div>

    <ul class="list-unstyled show collapse" id="catalogueless">

    @foreach (Auth::user()->uncatalogued_bookmarks as $bookmark)

        <li><a href="{{ $bookmark->url }}" target=_blank>{{ $bookmark->name ? $bookmark->name : $bookmark->url }}</a></li>

    @endforeach

    </ul>

    @foreach (Auth::user()->catalogues as $c)

        <div class="clearfix">
            <span class="ml-2 badge badge-warning">{{ $c->bookmarks()->count() }}</span><h4 class="float-left"><a class="text-secondary" data-toggle="collapse" href="#catalogue_{{ $c->id }}">{{ $c->name }}</a></h4>
        </div>

        <ul class="list-unstyled collapse" id="catalogue_{{ $c->id }}">

    @foreach ($c->bookmarks as $bookmark)

            <li><a href="{{ $bookmark->url }}" target=_blank>{{ $bookmark->name ? $bookmark->name : $bookmark->url }}</a></li>

    @endforeach

        </ul>

    @endforeach

@endif

@endsection
