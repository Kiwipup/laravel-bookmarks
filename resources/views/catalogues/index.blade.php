@extends('layouts.card')

@section('card-header')
    My Catalogues
@endsection

@section('card-content')

<p><a data-toggle="collapse" href="#addForm">New Catalogue</a></p>

<form id="addForm" class="collapse form clearfix pb-3" action="" method="post">
    @csrf
    <div class="form-group">
        <label for="new_name" class="font-weight-bold">Name</label>
        <input type="text" class="form-control" id="new_name" name="new_name" placeholder="Name...">
    </div>
    <div class="form-group">
        <label for="new_description" class="font-weight-bold">Description</label>
        <textarea class="form-control" name="new_description" id="new_description" placeholder="Description..."></textarea>
    </div>

    <ul class="list-unstyled">

@foreach (Auth::user()->uncatalogued_bookmarks as $b)

        <li>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="bookmark_check_{{ $b->id }}" id="bookmark_check_{{ $b->id }}">
              <label class="form-check-label" for="bookmark_check_{{ $b->id }}">{{ $b->name ? $b->name : $b->url }}</label>
            </div>
        </li>

@endforeach

        <li>
            <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="checkbox" name="bookmark_check_new" id="bookmark_check_new">
                <label class="form-check-label" for="bookmark_check_new">
                    <input oninput="check_checkbox('bookmark_check_new', 'new_bookmark_url')"  name="new_bookmark_url" id="new_bookmark_url" class="mt-2 form-control" type="text" placeholder="Enter a new URL...">
                </label>
            </div>
        </li>

    </ul>

    <button type="submit" class="btn btn-warning float-right">Add</button>
</form>

<div class="">
    <div class="row p-2 border-bottom font-weight-bold">
        <div class="col-2 d-flex align-items-end">Actions</div>
        <div class="col-10">Name</div>
    </div>

@if (Auth::user()->catalogues->count() == 0)

    <div class="text-center p-2 font-weight-light">
        <p class="pt-4">You don't have any catalogues yet.</p>
        <p class="">Create one by clicking "New Catalogue" above.</p>
    </div>

@endif

@foreach (Auth::user()->catalogues as $c)

    <div class="row p-2 font-weight-light">
        <div class="col-2 text-nowrap d-flex align-items-center">
            <a href="/catalogues/{{ $c->id }}/edit"><i class="text-danger fas fa-edit"></i></a>
            <form action="/catalogues/{{ $c->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn" type="submit"><i class="text-danger fas fa-trash-alt"></i></button>
            </form>
        </div>
        <div class="col-10 text-truncate d-flex align-items-center">{{ $c->name }}</div>
    </div>

@endforeach

</div>

@endsection
