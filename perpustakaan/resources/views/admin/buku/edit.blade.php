@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Update Buku #{{$buku->judul}}
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md- offset-md-2">
                            <form method="POST" action="{{ route('admin.update.buku',$buku->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Judul Buku</label>
                                    <input type="text" class="form-control" name="judul" value="{{$buku->judul}}">
                                    @error('judul')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="isbn">ISBN Buku</label>
                                    <input type="text" class="form-control" name="isbn" value="{{$buku->isbn}}">
                                    @error('isbn')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Penulis Buku</label>
                                    <input type="text" class="form-control" name="penulis" value="{{$buku->penulis}}">
                                    @error('penulis')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Tahun Terbit</label>
                                    <input type="number" class="form-control" name="tahun" value="{{$buku->tahun_terbit}}">
                                    @error('tahun')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Stok</label>
                                    <input type="text" class="form-control" name="stok" value="{{$buku->stok}}">
                                    @error('stok')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="kategori">Kategori</label>
                                    <select name="kategori" id="kategori"  class="form-control" >
                                        <option value="">-</option>
                                        @foreach($kategori as $k)
                                        <option value="{{$k->id}}" @if($buku->kategori->nama == $k->nama) selected @endif>{{$k->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="penerbit">Penerbit</label>
                                    <select name="penerbit" id="penerbit"  class="form-control" >
                                        <option value="" default>-</option>
                                        @foreach($penerbit as $p)
                                        <option value="{{$p->id}}" @if($buku->penerbit->nama == $p->nama) selected @endif>{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('penerbit')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="email">Cover Buku</label>
                                    <input type="file" accept="image/*" id="imgInp" onchange="loadFile(event)" class="form-control" name="cover_buku" value="{{'/storage/buku/'.$buku->cover()}}">
                                    @error('cover_buku')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <img src="#" id="preview" class="img-thumbnail mt-3" alt="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="desc">Sinopsis</label>
                                    <textarea class="form-control" name="sinopsis" cols="30" id="desc" rows="10">{{$buku->sinopsis}}</textarea>
                                    @error('sinopsis')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Cancel</button>
                                    <button type="submit" onclick="return confirm('Yakin akan mengubah data buku {{$buku->judul}}?')" class="btn btn-success btn-sm">Update Buku</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>

@endpush
@endsection
