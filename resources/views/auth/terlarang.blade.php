@extends('layouts.index4')
@section('content')
    <div class="jumbotron">
        <h2>
            Access Denied!!!
        </h2>
        <p>
            Maaf Anda Terlarang Untuk Mengakses Halaman ini
        </p>
        <p>
            <a class="btn btn-primary btn-large" href="{{ url('home')}}"> 
                <i class="fas fa-home"></i>
                Home 
            </a>
        </p>
    </div>
@endsection
