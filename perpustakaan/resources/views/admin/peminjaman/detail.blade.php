@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Peminjaman #{{$peminjaman->id}}
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form method="POST" action="{{ route('admin.store.peminjaman')}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Nama</label>
                                    <select name="member" id="member" class="form-control" required disabled>
                                        <option value="{{$peminjaman->member->nama}}">{{$peminjaman->member->nama}} - {{$peminjaman->member->kode_member}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Buku</label>
                                    <select name="member" id="member" class="form-control" required disabled>
                                        <option value="{{$peminjaman->buku->judul}}">{{$peminjaman->buku->judul}} - {{$peminjaman->buku->penerbit->nama}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tgl_pinjam" value="{{$peminjaman->tgl_pinjam}}" required disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Tanggal Pengembalian</label>
                                    <input type="date" class="form-control" name="tgl_pinjam" value="{{$peminjaman->tgl_kembali}}" required disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Denda</label>
                                    <input type="text" class="form-control" name="tgl_pinjam" value="Rp. {{number_format($peminjaman->denda,0,",",".")}}" required disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
