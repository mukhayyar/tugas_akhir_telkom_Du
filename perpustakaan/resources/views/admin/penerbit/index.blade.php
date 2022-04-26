@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="ms-auto">
                        <a class="btn btn-success" href="{{route('admin.create.penerbit')}}"><i class="fas fa-plus"></i> Tambah penerbit</a>
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
                    @if($penerbit->total())
                    <form method="GET">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari">
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Lokasi</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penerbit as $data)
                            <tr>
                                <td>{{($penerbit->currentPage() - 1) * $penerbit->perPage() + $loop->iteration}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->lokasi}}</td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="{{route('admin.show.penerbit',$data->id)}}">Detail</a>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.edit.penerbit',$data->id)}}">Edit</a>
                                    <form method="POST" action="{{route('admin.destroy.penerbit',$data->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Yakin akan menghapus data penerbit {{$data->judul}}?')" class="btn btn-danger btn-sm mt-2" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                    {{$penerbit->appends($request)->links('pagination::bootstrap-4')}}
                    @else
                    <form method="GET">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari">
                    </form>
                    <h4 class="text-center p-3">Data penerbit tidak ditemukan</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
