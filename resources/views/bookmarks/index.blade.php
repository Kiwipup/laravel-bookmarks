@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Bookmarks</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<form class="form clearfix pb-3" action="" method="post">
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
    <button type="submit" class="btn btn-success float-right">Add Bookmark</button>
</form>





<div class="">

    <div class="row p-2 border-bottom font-weight-bold">
        <div class="col-2 d-flex align-items-end">Actions</div>
        <div class="col-10">Alias<br>URL</div>
    </div>

@foreach (Auth::user()->bookmarks as $b)

    <div class="row p-2 font-weight-light">
        <div class="col-2 text-nowrap d-flex align-items-center">
            <i class="text-primary fas fa-edit"></i><i class="ml-2 text-danger fas fa-trash-alt"></i>
        </div>
        <div class="col-10 text-truncate">
            {!! $b->name ? $b->name : '<span class="text-black-50">(no name)</span>' !!}<br />
            {{ $b->url }}
        </div>
    </div>

@endforeach

</div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
