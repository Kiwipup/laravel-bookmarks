@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<form class="" method="post" action="/profile">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="favorite_color">Favorite Color:</label>
        <input class="form-control" type="text" id="favorite_color" name="favorite_color" value="{{ Auth::user()->profile()->first()->favorite_color }}" placeholder="You like purple, right?">
    </div>

    <div>
        <a href="{{ url('/home') }}" class="float-left btn btn-danger">Cancel</a>
        <button type="submit" class="float-right btn btn-primary">Save Profile</button>
    </div>

</form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
