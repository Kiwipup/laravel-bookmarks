@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@yield('card-header')</div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-{{ session('status_class') ? session('status_class') : 'success' }}" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

@yield('card-content')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
