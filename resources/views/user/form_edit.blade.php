@extends('layouts.index')
@section('content')
  @if ( Auth::user()->role == 'admin')
    @php
      $ar_role = ['admin','user'];
    @endphp
    @foreach ($data as $rs)
      <h3> Form Input User </h3>
      <form class="user" method="POST" action="{{ route('user.update',$rs->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          @php $val = ($errors->isEmpty()) ? $rs->name : old('nama'); @endphp
          <input type="text" name="nama" class="form-control form-control-user @error('nama') is-invalid @enderror" placeholder="Nama User" 
          value="{{ $val }}"}}">
          @error('nama')<div class="invalid-feedback"> {{ $message }} </div>@enderror
        </div>
        <div class="form-group">
          @php $val = ($errors->isEmpty()) ? $rs->email : old('email'); @endphp
          <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email" 
          value="{{ $val }}">
          @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
        </div>
        <div class="form-group">
          @php $val = ($errors->isEmpty()) ? $rs->password : old('password'); @endphp
          <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" 
          value="{{ $val }}">
          @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
        </div>
        <div class="form-group row">
          <label> Role </label>
          <select name="role" class="form-control @error('role') is-invalid @enderror">
            <option value="">-- Pilih Role --</option>
            @foreach ($ar_role as $role)
              @php $sel = ( $role == $rs->role) ? 'selected' : ''; @endphp
              @if($errors->isEmpty())
                <option value="{{ $role }}" {{ $sel }}> {{ $role }} </option>
              @else
                <option value="{{ $role }}"> {{ $role }} </option>
              @endif
            @endforeach
          </select>
          @error('role')<div class="invalid-feedback"> {{ $message }} </div>@enderror
        </div>
        <div class="form-group">
          <label> Foto </label>
          @php $val = ($errors->isEmpty()) ? $rs->foto : old('foto'); @endphp
          <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ $val }}">
          @error('foto')<div class="invalid-feedback"> {{ $message }} </div>@enderror
        </div>
        <button type="submit" name="proses" value="simpan" class="btn btn-warning">
          <i class="fas fa-pen"></i>
          Update
        </button>
      </form>
    @endforeach
  @else
    @include('auth.terlarang')
  @endif
@endsection