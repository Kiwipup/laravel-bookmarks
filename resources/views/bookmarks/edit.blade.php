@extends('layouts.card')

@section('card-header')
    Edit a Bookmark
@endsection

@section('card-content')

<form class="form clearfix pb-3" action="/bookmarks/{{ $b->id }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="new_url" class="font-weight-bold">URL</label>
        <input type="text" class="form-control" id="new_url" name="new_url" value="{{ $b->url }}" placeholder="Bookmark URL...">
    </div>
    <div class="form-group">
        <label for="new_name" class="font-weight-bold">Bookmark Alias</label>
        <input type="text" class="form-control" id="new_name" name="new_name" value="{{ $b->name }}" placeholder="Bookmark alias...">
    </div>
    <div class="form-group">
        <label for="new_description" class="font-weight-bold">Description</label>
        <textarea class="form-control" name="new_description" id="new_description" placeholder="Description...">{{ $b->description }}</textarea>
    </div>

    <ul class="list-unstyled">

@foreach (Auth::user()->catalogues as $c)

        <li>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="catalogue_check_{{ $c->id }}" id="catalogue_check_{{ $c->id }}" {{ in_array($c->id, $b->catalogue_ids) ? 'checked' : ''}}>
              <label class="form-check-label" for="catalogue_check_{{ $c->id }}">{{ $c->name }}</label>
            </div>
        </li>

@endforeach

    </ul>
    <a href="/bookmarks" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-warning float-right">Update</button>
</form>

<form class="form" action="/bookmarks/{{ $b->id }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit" class="btn btn-danger">Remove from Catalogues & Delete</button>
</form>

@endsection
