@extends('layouts.index2')
@section('content')
    @foreach ($ar_post as $post)
        <h6 class="m-0 font-weight-bold text-primary">{{ $post->nama}}</h6>
        <br>
        @if(!empty($post->foto))
            <img src="{{ asset('img/post') }}/{{ $post->foto }}" height="10%">
        @else
            <img src="{{ asset('img') }}/nocake.png" height="10%">
        @endif 
        <br><br>
        Bahan - Bahan : 
        <p> 
            {{ $post->bahan }} 
        </p>
        Cara Pembuatan : 
        <p>
            {{ $post->cara }} 
        </p>
    @endforeach
@endsection