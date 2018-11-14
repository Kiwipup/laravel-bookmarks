@extends('layouts.card')

@section('card-header')
    Dashboard
@endsection

@section('card-content')

<div class="clearfix">
    <span class="ml-2 badge badge-warning">{{ Auth::user()->uncatalogued_bookmarks()->count() }}</span><h4 class="float-left"><a class="text-secondary" data-toggle="collapse" href="#catalogueless">Uncatalogued</a></h4>
</div>

<ul class="list-unstyled show collapse" id="catalogueless">
@foreach (Auth::user()->uncatalogued_bookmarks as $bookmark)
    <li><a href="{{ $bookmark->url }}" target=_blank>{{ $bookmark->name ? $bookmark->name : $bookmark->url }}</a></li>
@endforeach
</ul>





<!-- TODO: Add messaging if there are no bookmarks -->

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

@endsection
