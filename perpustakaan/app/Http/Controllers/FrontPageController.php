<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->input('cari');
        if($cari >= 0 || $cari <= 10000) {
            $kategori = Kategori::when($cari, function($query) use ($cari) {
                return $query->where('nama','like','%'.$cari.'%');
            })->paginate(1);
            $penerbit = Penerbit::when($cari, function($query) use ($cari) {
                return $query->where('nama','like','%'.$cari.'%');
            })->paginate(1);
        }
        if(empty($kategori->items())) {
            $kategori = "";
        } else if($kategori->total() != 0){
            $kategori = $kategori->get(0)->id;
        } else {
            $kategori = "";
        }
        if(empty($penerbit->items())) {
            $penerbit = "";
        } else if($penerbit->total() != 0 || empty($kategori->items())){
            $penerbit = $penerbit->get(0)->id;
        } else {
            $penerbit = "";
        }
        $buku = Buku::when([$cari,$kategori,$penerbit], function($query) use ($cari,$kategori,$penerbit) {
            return $query->where('penulis','like','%'.$cari.'%')->orWhere('judul','like','%'.$cari.'%')->orWhere('tahun_terbit','like','%'.$cari.'%')->orWhere('kategori_id','=',$kategori)->orWhere('penerbit_id','=',$penerbit)->orWhere('isbn','=',$cari);
        })->paginate(3);
        $request = $request->all();
        return view('front/index',compact('buku','request'));
    }

    public function about()
    {
        return view('front/about');

    }

    public function detail(Buku $buku)
    {
        return view('front/detail',compact('buku'));
    }

    public function katalog(Request $request, $katalog)
    {
        $buku = Buku::where('kategori_id',$katalog)->paginate(3);
        $request = $request->all();
        return view('front/index',compact('buku','request'));
    }

    public function penerbit(Request $request, $penerbit)
    {
        $buku = Buku::where('penerbit_id',$penerbit)->paginate(3);
        $request = $request->all();
        return view('front/index',compact('buku','request'));

    }
}
