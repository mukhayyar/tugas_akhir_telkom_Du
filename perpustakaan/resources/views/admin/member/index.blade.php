@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="ms-auto">
                        <a class="btn btn-success" href="{{route('admin.create.member')}}"><i class="fas fa-plus"></i> Tambah Member</a>
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
                    @if($member->total())
                    <form action="">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari">
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Member</th>
                                <th>Nama </th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Kuota</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $data)
                            <tr>
                                <td>{{($member->currentPage() - 1) * $member->perPage() + $loop->iteration}}</td>
                                <td>{{$data->kode_member}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>{{$data->no}}</td>
                                <td>{{$data->kuota_peminjaman}}</td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="{{route('admin.show.member',$data->id)}}">Detail</a>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.edit.member',$data->id)}}">Edit</a>
                                    <form method="POST" action="{{route('admin.destroy.member',$data->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Yakin akan menghapus data member {{$data->kode_member}}?');" class="btn btn-danger btn-sm mt-2" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$member->appends($request)->links('pagination::bootstrap-4')}}
                    @else
                    <form action="">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari">
                    </form>
                    <h4 class="text-center p-3">Data member tidak ditemukan</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
