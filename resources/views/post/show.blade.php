@extends('layouts.index')
@section('content')
    @if ( Auth::user()->role == 'admin')
        @foreach ($ar_post as $post)
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $post->nama}}</h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary text-right"> Nama Author : {{ $post->author }}</h6>
                    <h6 class="m-0 font-weight-bold text-primary text-right"> Tanggal Posting : {{ $post->tglPosting }}</h6>
                    <br>
                    @if(!empty($post->foto))
                        <img src="{{ asset('img/post') }}/{{ $post->foto }}" height="20%">
                    @else
                        <img src="{{ asset('img') }}/nocake.png" height="20%">
                    @endif 
                    <br><br>
                    Bahan - Bahan : {{ $post->bahan }} 
                    <br><br>
                    Cara Pembuatan : {{ $post->cara }} 
                </div>
            </div>  
            <a href="{{ url('post') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
                Go Back
            </a>  
        @endforeach
    @else
        @include('auth.terlarang')
    @endif
@endsection