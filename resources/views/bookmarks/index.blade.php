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



<div class="">

    <div class="row p-2 border-bottom font-weight-bold">
        <div class="col-2 d-flex align-items-end">Actions</div>
        <div class="col-10">Name<br>URL</div>
    </div>

@foreach (Auth::user()->bookmarks as $b)

    <div class="row p-2 font-weight-light">
        <div class="col-2 text-nowrap d-flex align-items-center">
            <i class="text-success fas fa-edit"></i><i class="ml-2 text-danger fas fa-trash-alt"></i>
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
