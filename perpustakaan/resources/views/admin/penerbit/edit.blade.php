@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Update Penerbit #{{$penerbit->nama}}
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form method="POST" action="{{ route('admin.update.penerbit',$penerbit->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Nama penerbit</label>
                                    <input type="text" class="form-control" name="nama" value="{{$penerbit->nama}}">
                                    @error('penerbit')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Lokasi penerbit</label>
                                    <input type="text" class="form-control" name="lokasi" value="{{$penerbit->lokasi}}">
                                    @error('lokasi')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Cancel</button>
                                    <button type="submit" onclick="return confirm('Yakin akan mengubah data penerbit {{$penerbit->judul}}?')" class="btn btn-success btn-sm">Update penerbit</button>
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
