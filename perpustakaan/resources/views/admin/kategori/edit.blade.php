@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Update Kategori #{{$kategori->nama}}
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form method="POST" action="{{ route('admin.update.kategori',$kategori->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Nama Kategori</label>
                                    <input type="text" class="form-control" name="nama" value="{{$kategori->nama}}">
                                    @error('nama')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Cancel</button>
                                    <button type="submit" onclick="return confirm('Yakin akan mengubah data kategori {{$kategori->judul}}?')" class="btn btn-success btn-sm">Update kategori</button>
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
