@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Peminjaman
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form method="POST" action="{{ route('admin.store.peminjaman')}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Nama</label>
                                    <select name="member" id="member" class="form-control" required>
                                        @forelse($member as $data_member)
                                        <option value="{{$data_member->id}}">{{$data_member->nama}} - {{$data_member->kode_member}}</option>
                                        @empty
                                        <option value="">--- Member kosong ---</option>
                                        @endforelse
                                    </select>
                                    @error('member')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Buku</label>
                                    <select name="buku" id="" class="form-control" required>
                                        @forelse($buku as $data_buku)
                                        <option value="{{$data_buku->id}}">{{$data_buku->judul}}</option>
                                        @empty
                                        <option value="">--- Buku kosong / dipinjam---</option>
                                        @endforelse
                                    </select>
                                    @error('buku')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tgl_pinjam" required>
                                    @error('tgl_pinjam')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Cancel</button>
                                    <button type="submit" class="btn btn-success btn-sm">Tambah Peminjaman</button>
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
