@extends('layouts.index')
@section('content')
  @php
    $ar_role = ['admin','user'];
  @endphp
  <h3> Form Input User </h3>
  <form class="user" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <input type="text" name="nama" class="form-control form-control-user @error('nama') is-invalid @enderror" placeholder="Nama User" 
      value="{{ old('nama') }}">
      @error('nama')<div class="invalid-feedback"> {{ $message }} </div>@enderror
    </div>
    <div class="form-group">
      <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email" 
      value="{{ old('email') }}">
      @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password"
      value="{{ old('password') }}">
      @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
    </div>
    <div class="form-group row">
      <label> Role </label>
      <select name="role" class="form-control @error('role') is-invalid @enderror">
        <option value="">-- Pilih Role --</option>
        @foreach ($ar_role as $role)
          @php $sel = ( old('role') == $role) ? 'selected' : ''; @endphp
          <option value="{{ $role }}" {{ $sel }}> {{ $role }} </option>
        @endforeach
      </select>
      @error('role')<div class="invalid-feedback"> {{ $message }} </div>@enderror
    </div>
    <div class="form-group">
      <label> Foto </label>
      <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
      @error('foto')<div class="invalid-feedback"> {{ $message }} </div>@enderror
    </div>
    <button type="submit" name="proses" value="simpan" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      Add
    </button>
  </form>
@endsection