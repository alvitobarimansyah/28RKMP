@extends('layouts.index')
@section('content')
    @if ( Auth::user()->role == 'admin')
        <h3> Form Input Post </h3>
        <br>
        <form class="user" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="nama" class="form-control form-control-user @error('nama') is-invalid @enderror" 
                placeholder="Resep" value="{{ old('nama') }}">
                @error('nama')<div class="invalid-feedback"> {{ $message }} </div>@enderror
            </div>
            <div class="form-group">
                <label> Bahan - Bahan </label>
                <textarea name="bahan" class="form-control @error('bahan') is-invalid @enderror" cols="40" rows="20"> {{ old('bahan') }} </textarea>
                @error('bahan')<div class="invalid-feedback"> {{ $message }} </div>@enderror
            </div>
            <div class="form-group">
                <label> Cara Pembuatan </label>
                <textarea name="cara" class="form-control @error('cara') is-invalid @enderror" cols="40" rows="20"> {{ old('cara') }} </textarea>
                @error('cara')<div class="invalid-feedback"> {{ $message }} </div>@enderror
            </div>
            <div class="form-group">
                <input type="text" name="author" class="form-control form-control-user @error('author') is-invalid @enderror" 
                placeholder="Nama Author" value="{{ old('author') }}">
                @error('author')<div class="invalid-feedback"> {{ $message }} </div>@enderror
            </div>
            <div class="form-group">
                <label> Tanggal Posting </label>
                <input type="date" name="tglposting" class="form-control @error('tglposting') is-invalid @enderror" value="{{ old('tglposting') }}">
                @error('tglposting')<div class="invalid-feedback"> {{ $message }} </div>@enderror
            </div>
            <div class="form-group">
                <label> Foto </label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto') }}">
                @error('foto')<div class="invalid-feedback"> {{ $message }} </div>@enderror
            </div>
            <button type="submit" name="proses" value="simpan" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add
            </button>
        </form>
    @else
        @include('auth.terlarang')
    @endif
@endsection