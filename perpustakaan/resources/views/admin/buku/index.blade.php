@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="ms-auto">
                        <a class="btn btn-success" href="{{route('admin.create.buku')}}"><i class="fas fa-plus"></i> Tambah Buku</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    @endif
                    @if($buku->total())
                    <form method="GET">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari">
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ISBN</th>
                                <th>Cover Buku</th>
                                <th>Judul Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Penerbit</th>
                                <th>Stok</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $data)
                            <tr>
                                <td>{{($buku->currentPage() - 1) * $buku->perPage() + $loop->iteration}}</td>
                                <td>{{$data->isbn}}</td>
                                <td><img width="150" height="150" src="{{ $data->cover()}}" alt="Cover Buku"></td>
                                <td>{{$data->judul}} - {{$data->kategori->nama}}</td>
                                <td>{{$data->tahun_terbit}}</td>
                                <td>{{$data->penerbit->nama}}</td>
                                <td>{{$data->stok}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.edit.buku',$data->id)}}">Edit</a>
                                    <form method="POST" action="{{route('admin.destroy.buku',$data->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Yakin akan menghapus data buku {{$data->judul}}?')" class="btn btn-danger btn-sm mt-2" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$buku->appends($request)->links('pagination::bootstrap-4')}}
                    @else
                    <form method="GET">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari">
                    </form>
                    <h4 class="text-center p-3">Data buku tidak ditemukan</h4>
                    @endif
                </div>
            </div>
    </div>
</div>
@endsection
