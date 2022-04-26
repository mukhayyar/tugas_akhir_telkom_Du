@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="ms-auto">
                        <a class="btn btn-success" href="{{route('admin.create.peminjaman')}}"><i class="fas fa-plus"></i> Tambah Peminjaman</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if($peminjaman->total())
                    <form action="">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari">
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Peminjam</th>
                                <th>Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Denda</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $data)
                            <tr>
                                <td>{{($peminjaman->currentPage() - 1) * $peminjaman->perPage() + $loop->iteration}}</td>
                                <td>
                                    {{$data->member->kode_member}}
                                    -
                                    {{$data->member->nama}}
                                </td>
                                <td>{{$data->buku->judul}}</td>
                                <td>{{$data->tgl_pinjam}}</td>
                                <td>{{$data->tgl_kembali}}</td>
                                @if($data->denda != null)
                                <td>Rp. {{number_format($data->denda,0,",",".")}}</td>
                                @elseif(is_null($data->denda))
                                <td>-</td>
                                @else
                                <td>Tidak Didenda</td>
                                @endif
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.show.peminjaman',$data->id)}}">Detail</a>
                                    @if(is_null($data->tgl_kembali))
                                    <form action="{{route('admin.return.peminjaman',$data->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-danger btn-sm mt-2" onclick="return confirm('Yakin untuk mengembalikan buku ini?')" type="submit">Kembali</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$peminjaman->appends($request)->links('pagination::bootstrap-4')}}
                    @else
                    <h4 class="text-center p-3">Belum ada data peminjaman</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
