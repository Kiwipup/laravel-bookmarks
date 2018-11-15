@extends('layouts.card')

@section('card-header')
    Edit a Catalogue

    <form class="form float-right" action="/catalogues/{{ $c->id }}" method="POST">
        @csrf
        @method("DELETE")
        <button class="btn btn-sm bg-transparent" type="submit"><i class="text-danger fas fa-trash-alt"></i></button>
    </form>

@endsection

@section('card-content')

<form class="form clearfix pb-3" action="/catalogues/{{ $c->id }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="new_name" class="font-weight-bold">Name</label>
        <input type="text" class="form-control" id="new_name" name="new_name" value="{{ $c->name }}" placeholder="Catalogue name...">
    </div>
    <div class="form-group">
        <label for="new_description" class="font-weight-bold">Description</label>
        <textarea class="form-control" name="new_description" id="new_description" placeholder="Description...">{{ $c->description }}</textarea>
    </div>

    <ul class="list-unstyled">

@foreach (Auth::user()->bookmarks as $b)

        <li>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="bookmark_check_{{ $b->id }}" id="bookmark_check_{{ $b->id }}" {{ in_array($b->id, $c->bookmark_ids) ? 'checked' : ''}}>
              <label class="form-check-label" for="bookmark_check_{{ $b->id }}">{{ $b->name ? $b->name : $b->url }}</label>
            </div>
        </li>

@endforeach

        <li>
            <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="checkbox" name="bookmark_check_new" id="bookmark_check_new">
                <label class="form-check-label" for="bookmark_check_new">
                    <input oninput="check_checkbox('bookmark_check_new', 'new_bookmark_url')"  name="new_bookmark_url" id="new_bookmark_url" class="mt-2 form-control" type="text" placeholder="New URL...">
                </label>
            </div>
        </li>

    </ul>
    <button type="submit" class="ml-2 btn btn-warning float-right">Update</button>
    <a href="/catalogues" class="btn btn-secondary float-right">Cancel</a>
</form>


@endsection
