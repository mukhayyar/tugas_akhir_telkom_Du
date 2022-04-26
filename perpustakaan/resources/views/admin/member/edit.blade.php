@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Update Member #{{$member->kode_member}}
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form method="POST" action="{{ route('admin.update.member',$member->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Kode Member</label>
                                    <input type="text" class="form-control" name="nama" value="{{$member->kode_member}}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{$member->nama}}">
                                    @error('nama')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="{{$member->alamat}}">
                                    @error('alamat')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">No Handphone</label>
                                    <input type="text" class="form-control" name="no" value="{{$member->no}}">
                                    @error('no')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Cancel</button>
                                    <button type="submit" onclick="return confirm('Yakin akan mengubah data member {{$member->kode_member}}?')" class="btn btn-success btn-sm">Update Member</button>
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
