@extends('layouts.index')
@section('content') 
    @if ( Auth::user()->role == 'admin')    
        @php
            $no = 1;
            $ar_judul = ['No', 'Resep', 'Nama Author', 'Action'];
        @endphp
        <a href="{{ route('post.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add Data
        </a>
        <br><br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Daftar Post </h6>
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
                            @foreach ($ar_post as $post)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $post->nama }} </td>
                                    <td> {{ $post->author }} </td>
                                    <td>
                                        <form method="POST" action="{{ route('post.destroy',$post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('post.show',$post->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>&nbsp;
                                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>&nbsp;
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