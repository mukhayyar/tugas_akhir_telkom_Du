@extends('layouts.main')
@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url('{{$buku->cover()}}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{$buku->judul}}</h1>
                    <span class="meta">
                        <a href="#!"></a>
                        {{$buku->penulis}},
                        {{$buku->tahun_terbit}},
                        {{$buku->penerbit->nama}},
                        {{$buku->penerbit->lokasi}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h3>Kategori</h3>
                <p>{{$buku->kategori->nama}}</p>
                <h3>Sinopsis</h3>
                <p>{{$buku->sinopsis}}</p>
                <h3>Stok Buku di Rak</h3>
                @if($buku->stok > 0)
                <p>{{$buku->stok}} Buku | Tersedia</p>
                <div class="alert alert-success"><p>Silahkan ke bagian admin untuk melakukan proses peminjaman</p></div>
                @else
                <p>{{$buku->stok}} Buku | Sedang Dipinjam Semua</p>
                <div class="alert alert-warning"><p>Cari buku yang masih tersedia</p></div>
                @endif
            </div>
        </div>
    </div>
</article>
@endsection
