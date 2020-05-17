@extends('layouts.index3')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h2>
                    Welcome To Our Website
                </h2>
                <p>
                   Silahkan lihat berbagai resep kue lezat yang mudah dan praktis 
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="{{ url('resep') }}"> 
                        Lihat Daftar Resep 
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
