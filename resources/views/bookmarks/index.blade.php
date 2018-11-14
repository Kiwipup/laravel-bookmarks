@extends('layouts.card')

@section('card-header')
    My Bookmarks
@endsection

@section('card-content')

<p><a data-toggle="collapse" href="#addForm">New Bookmark</a></p>

<form id="addForm" class="collapse form clearfix pb-3" action="" method="post">
    @csrf
    <div class="form-group">
        <label for="new_url" class="font-weight-bold">URL</label>
        <input type="text" class="form-control" id="new_url" name="new_url" placeholder="Bookmark URL...">
    </div>
    <div class="form-group">
        <label for="new_name" class="font-weight-bold">Bookmark Alias</label>
        <input type="text" class="form-control" id="new_name" name="new_name" placeholder="Bookmark alias...">
    </div>
    <div class="form-group">
        <label for="new_description" class="font-weight-bold">Description</label>
        <textarea class="form-control" name="new_description" id="new_description" placeholder="Description..."></textarea>
    </div>

    <ul class="list-unstyled">

@foreach (Auth::user()->catalogues as $c)

        <li>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="catalogue_check_{{ $c->id }}" id="catalogue_check_{{ $c->id }}">
              <label class="form-check-label" for="catalogue_check_{{ $c->id }}">{{ $c->name }}</label>
            </div>
        </li>

@endforeach

        <li>
            <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="checkbox" name="catalogue_check_new" id="catalogue_check_new">
                <label class="form-check-label" for="catalogue_check_new">
                    <input oninput="check_checkbox('catalogue_check_new', 'new_catalogue_name')"  name="new_catalogue_name" id="new_catalogue_name" class="mt-2 form-control" type="text" placeholder="Enter a new catalogue">
                </label>
            </div>
        </li>

    </ul>

    <button type="submit" class="btn btn-warning float-right">Add</button>
</form>

<div class="">
    <div class="row p-2 border-bottom font-weight-bold">
        <div class="col-2 d-flex align-items-end">Actions</div>
        <div class="col-10">Alias<br>URL</div>
    </div>

@foreach (Auth::user()->bookmarks as $b)

    <div class="row p-2 font-weight-light">
        <div class="col-2 text-nowrap d-flex align-items-center">
            <a href="/bookmarks/{{ $b->id }}/edit"><i class="text-danger fas fa-edit"></i></a>
            <form action="/bookmarks/{{ $b->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn" type="submit"><i class="text-danger fas fa-trash-alt"></i></button>
            </form>
        </div>
        <div class="col-10 text-truncate">
            {!! $b->name ? $b->name : '<span class="text-black-50">(no name)</span>' !!}<br />
            {{ $b->url }}
        </div>
    </div>

@endforeach

</div>

@endsection
