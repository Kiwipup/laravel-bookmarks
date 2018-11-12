@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

@foreach (Auth::user()->catalogues as $catalogue)

    <h4>{{ $catalogue->name }}</h4>
    <ul>
@foreach ($catalogue->bookmarks as $bookmark)
        <li><a href="{{ $bookmark->url }}" target=_blank>{{ $bookmark->name ? $bookmark->name : $bookmark->url }}</a></li>
@endforeach
    </ul>

@endforeach



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
