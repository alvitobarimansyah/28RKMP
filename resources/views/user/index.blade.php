@extends('layouts.index')
@section('content') 
  @if ( Auth::user()->role == 'admin')  
    @php
      $no = 1;
      $ar_judul = ['No', 'Nama', 'Email', 'Role', 'Foto', 'Action'];
    @endphp
    <a href="{{ route('user.create') }}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      Add Data
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Daftar User </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
              @foreach ($ar_judul as $jdl)
                <th> {{ $jdl }} </th>
              @endforeach 
              </tr>
            </thead>
            <tbody>
              @foreach ($ar_user as $user)
                <tr>
                  <td> {{ $no++ }} </td>
                  <td> {{ $user->name }} </td>
                  <td> {{ $user->email }} </td>
                  <td> {{ $user->role }} </td>
                  <td>
                    @if(!empty($user->foto))
                      <img src="{{ asset('img/user') }}/{{ $user->foto }}" height="10%">
                    @else
                      <img src="{{ asset('img') }}/nophoto.png" height="10%">
                    @endif
                  </td>
                  <td>
                    <form method="POST" action="{{ route('user.destroy',$user->id) }}">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('user.show',$user->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>&nbsp;
                      <a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>&nbsp;
                      <button type="submit" onclick="return confirm('Yakin dihapus')" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @else
    @include('auth.terlarang')
  @endif
@endsection