@extends('layouts.main')
@section('content')

<!-- Page Header-->
<header class="masthead" style="background-image: url('/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Perpustakaan Rumah</h1>
                    <span class="subheading">Buku adalah jendela dunia</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <form action="">
        <input class="form-control mb-4" type="text" placeholder="Cari buku..." name="cari">
    </form>
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @forelse($buku as $data)
            <!-- Post preview-->
            <div class="post-preview">
                <div class="row">
                    <div class="col-md-8">
                        <a href="{{route('front.detail',$data->id)}}">
                        <h5 class="post-title">{{$data->judul}}</h5>
                        </a>
                        <p class="post-subtitle">
                            Sinopsis:
                            <br>
                            {{Str::limit($data->sinopsis,100)}}
                        </p>
                        <div class="float-left">
                            <p class="p-0">ISBN: {{$data->isbn}}</p>
                        </div>
                        <div class="float-left">
                            <p class="p-0">Tahun Terbit: {{$data->tahun_terbit}}</p>
                        </div>
                        <div class="float-right">
                            <p>Kategori: <a href="/kategori/{{$data->kategori->id}}">{{$data->kategori->nama}}</a> </p>
                        </div>
                        <p class="p-0">Penulis: {{$data->penulis}}</p>
                        <p class="p-0">Penerbit: <a href="/penerbit/{{$data->penerbit->id}}">{{$data->penerbit->nama}}</a></p>
                    </div>
                    <div class="col-md-4 ms-auto">
                        <img src="{{$data->cover()}}" width="200" height="200" alt="{{$data->judul}}">
                    </div>
                </div>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @empty
            <div class="post-preview">
                <h2 class="post-title">Buku masih kosong! hubungi admin untuk menambahkan data</h2>
            </div>
            @endforelse
            <!-- Pagination-->
            {{$buku->appends($request)->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection
