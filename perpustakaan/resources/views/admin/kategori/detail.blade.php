@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Kategori #{{$kategori->nama}}
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Nama</label>
                                    <select name="member" id="member" class="form-control" required disabled>
                                        <option value="{{$kategori->nama}}">{{$kategori->nama}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Buku dengan kategori {{$kategori->nama}}</label>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Buku</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kategori->buku as $buku)
                                            <tr>
                                                <td>#</td>
                                                <td>{{$buku->judul}}</td>
                                            </tr>
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
