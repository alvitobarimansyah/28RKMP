@extends('layouts.index')
@section('content')
    @if ( Auth::user()->role == 'admin')
        @foreach ($data as $rs)
            <h3> Form Input Post </h3>
            <form class="user" method="POST" action="{{ route('post.update',$rs->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    @php $val = ($errors->isEmpty()) ? $rs->nama : old('nama'); @endphp
                    <input type="text" name="nama" class="form-control form-control-user @error('nama') is-invalid @enderror" 
                    placeholder="Resep" value="{{ $val }}">
                    @error('nama')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>
                <div class="form-group">
                    <label> Bahan - Bahan </label>
                    @php $val = ($errors->isEmpty()) ? $rs->bahan : old('bahan'); @endphp
                    <textarea name="bahan" class="form-control @error('bahan') is-invalid @enderror" 
                    cols="20" rows="40"> {{ $val }} </textarea>
                    @error('bahan')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>
                <div class="form-group">
                    <label> Cara Pembuatan </label>
                    @php $val = ($errors->isEmpty()) ? $rs->cara : old('cara'); @endphp
                    <textarea name="cara" class="form-control @error('cara') is-invalid @enderror" 
                    cols="40" rows="20"> {{ $val }} </textarea>
                    @error('cara')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>
                <div class="form-group">
                    @php $val = ($errors->isEmpty()) ? $rs->author : old('author'); @endphp
                    <input type="text" name="author" class="form-control form-control-user @error('author') is-invalid @enderror" 
                    placeholder="Nama Author" value="{{ $val }}">
                    @error('author')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>
                <div class="form-group">
                    <label> Tanggal Posting </label>
                    @php $val = ($errors->isEmpty()) ? $rs->tglPosting : old('tglposting'); @endphp
                    <input type="date" name="tglposting" class="form-control @error('tglposting') is-invalid @enderror" value="{{ $val }}">
                    @error('tglposting')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>
                <div class="form-group">
                    <label> Foto </label>
                    @php $val = ($errors->isEmpty()) ? $rs->foto : old('foto'); @endphp
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ $val }}">
                    @error('foto')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>
                <button type="submit" name="proses" value="ubah" class="btn btn-warning">
                    <i class="fas fa-pen"></i>
                    Update
                </button>
            </form>
        @endforeach
    @else
        @include('auth.terlarang')
    @endif
@endsection