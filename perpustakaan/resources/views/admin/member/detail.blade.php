@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Member #{{$member->nama}}
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Nama</label>
                                    <select name="member" id="member" class="form-control" required disabled>
                                        <option value="{{$member->nama}}">{{$member->nama}} - {{$member->kode_member}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Alamat</label>
                                    <select name="member" id="member" class="form-control" required disabled>
                                        <option value="{{$member->alamat}}">{{$member->alamat}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Denda yang pernah dibayar</label>
                                    <input type="text" class="form-control" value="{{$total_denda}}" required disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Buku  yang masih dipinjam</label>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Buku</th>
                                                <th>Tgl Pinjam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($member->peminjaman as $pinjam)
                                            @if($pinjam->tgl_kembali == "")
                                            <tr>
                                                <td>#</td>
                                                <td>{{$pinjam->buku->judul}}</td>
                                                <td>{{$pinjam->tgl_pinjam}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Cancel</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
