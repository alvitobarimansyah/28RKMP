@extends('layouts.index')
@section('content')
    @if ( Auth::user()->role == 'admin')
        @foreach ($ar_user as $user)
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if(!empty($user->foto))
                        <img src="{{ asset('img/user') }}/{{ $user->foto }}" height="20%">
                    @else
                        <img src="{{ asset('img') }}/nophoto.png" height="20%">
                    @endif <br>
                    Nama User : {{ $user->name}} <br>
                    Email : {{ $user->email}} <br>
                    Role : {{ $user->role}} <br>
                </div>
            </div>  
            <a href="{{ url('user') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
                Go Back
            </a>  
        @endforeach
    @else
        @include('auth.terlarang')
    @endif
@endsection