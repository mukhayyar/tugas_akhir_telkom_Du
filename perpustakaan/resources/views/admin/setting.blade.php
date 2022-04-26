@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Setting Password
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            @if(session('alert'))
                            <div class="alert alert-danger">
                                <p class="text-sm">{{session('alert')}}</p>
                            </div>
                            @elseif(session('success'))
                            <div class="alert alert-success">
                                <p class="text-sm">{{session('success')}}</p>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('home.setting.update')}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Password Lama</label>
                                    <input type="password" class="form-control" name="old_password" required>
                                    @error('penulis')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Password Baru</label>
                                    <input type="password" class="form-control" name="password" required>
                                    @error('penulis')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="judul">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password_confirm" required>
                                    @error('penulis')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Cancel</button>
                                    <button type="submit" onclick="return confirm('Yakin akan mengganti data admin? hubungi developer bilamana ada kesalahan dalam update')" class="btn btn-success btn-sm">Ubah Password</button>
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
