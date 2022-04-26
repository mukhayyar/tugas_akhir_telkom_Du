<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->input('cari');
        if($cari >= 0 || $cari <= 10000){
            $kategori = Kategori::when($cari, function($query) use ($cari) {
                return $query->where('nama','like','%'.$cari.'%');
            })->paginate(3);
            $penerbit = Penerbit::when($cari, function($query) use ($cari) {
                return $query->where('nama','like','%'.$cari.'%');
            })->paginate(3);
        }
        if(empty($kategori->items())) {
            $kategori = "";
        } else if($kategori->total() != 0 ){
            $kategori = $kategori->get(0)->id;
        } else {
            $kategori = "";
        }
        if(empty($penerbit->items())) {
            $penerbit = "";
        } else if($penerbit->total() != 0){
            $penerbit = $penerbit->get(0)->id;
        } else {
            $penerbit = "";
        }
        // dd($penerbit, $kategori);
        $buku = Buku::when([$cari,$kategori,$penerbit], function($query) use ($cari,$kategori,$penerbit) {
            return $query->where('penulis','like','%'.$cari.'%')->orWhere('judul','like','%'.$cari.'%')->orWhere('tahun_terbit','like','%'.$cari.'%')->orWhere('kategori_id','=',$kategori)->orWhere('penerbit_id','=',$penerbit)->orWhere('isbn','=',$cari);
        })->paginate(5);
        $request = $request->all();
        return view('/admin/buku/index',compact('buku','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('kategori')->get();
        $penerbit = DB::table('penerbit')->get();
        return view('/admin/buku/tambah',compact('kategori','penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Buku $buku)
    {
        $this->validate($request,[
            'judul' => 'required',
            'isbn' => 'required',
            'penulis' => 'required',
            'tahun' => 'required',
            'kategori' => 'required|numeric',
            'penerbit' => 'required|numeric',
            'sinopsis' => 'required',
            'cover_buku' => 'required',
            'stok' => 'required|numeric',
        ]);
        if($request->hasFile('cover_buku'))
        {
            $image = $request->file('cover_buku');
            $filename = time().$image->getClientOriginalName();
            Storage::disk('local')->putFileAs('public/buku', $image, $filename);
            $buku->cover_buku = $filename;
        }
        $buku->judul = $request->input('judul');
        $buku->isbn = $request->input('isbn');
        $buku->penulis = $request->input('penulis');
        $buku->sinopsis = $request->input('sinopsis');
        $buku->tahun_terbit = $request->input('tahun');
        $buku->penerbit_id = $request->input('penerbit');
        $buku->kategori_id = $request->input('kategori');
        $buku->stok = $request->input('stok');
        $buku->save();

        return redirect()->route('admin.buku')->with('status','Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($buku)
    {
        $buku = Buku::with(['penerbit','kategori'])->find($buku);
        $kategori = DB::table('kategori')->get();
        $penerbit = DB::table('penerbit')->get();
        return view('/admin/buku/edit',compact('buku','kategori','penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $this->validate($request,[
            'judul' => 'required',
            'isbn' => 'required',
            'penulis' => 'required',
            'tahun' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'sinopsis' => 'required',
            'stok' => 'required',
        ]);
        if($request->hasFile('cover_buku'))
        {
            $image = $request->file('cover_buku');
            $filename = time().$image->getClientOriginalName();
            Storage::disk('local')->putFileAs('public/buku', $image, $filename);
            $buku->cover_buku = $filename;
        }
        $buku->judul = $request->input('judul');
        $buku->isbn = $request->input('isbn');
        $buku->penulis = $request->input('penulis');
        $buku->sinopsis = $request->input('sinopsis');
        $buku->tahun_terbit = $request->input('tahun');
        $buku->penerbit_id = $request->input('penerbit');
        $buku->kategori_id = $request->input('kategori');
        $buku->stok = $request->input('stok');
        $buku->update();

        return redirect()->route('admin.buku')->with('status','Data buku berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('admin.buku')->with('danger','Data buku berhasil dihapus');
    }
}
