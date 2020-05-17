@extends('layouts.index2')
@section('content')
    <h3> Daftar Macam - Macam Resep Kue Lezat Yang Mudah dan Praktis </h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($ar_post as $post)
                    <div class="col-md-3">
                        <div class="card">
                            @if(!empty($post->foto))
                                <img src="{{ asset('img/post') }}/{{ $post->foto }}" class="featured-image">
                            @else
                                <img src="{{ asset('img') }}/nocake.png" class="featured-image">
                            @endif
                            <div class="card-block">
                                <br>
                                <div class="container">
                                    <h5 class="card-title">
                                        {{ $post->nama }}
                                    </h5>
                                    <p>
                                        <a class="btn btn-primary" href="{{ route('resep.show',$post->id) }}"> Lihat Detail Resep </a> 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
