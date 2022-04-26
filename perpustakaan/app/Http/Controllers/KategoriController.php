<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->input('cari');
        $kategori = Kategori::when($cari, function($query) use ($cari) {
            return $query->where('nama','like','%'.$cari.'%');
        })->paginate(5);
        $request = $request->all();
        return view('/admin/kategori/index',compact('kategori','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/kategori/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kategori $kategori)
    {
        $this->validate($request,[
            'nama' => 'required',
        ]);

        $kategori->nama = $request->input('nama');
        $kategori->save();

        return redirect()->route('admin.kategori')->with('status','Data kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kategori)
    {
        $kategori = Kategori::with('buku')->find($kategori);
        return view('admin/kategori/detail',compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('/admin/kategori/edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request,[
            'nama' => 'required',
        ]);
        $kategori->nama = $request->input('nama');
        $kategori->update();

        return redirect()->route('admin.kategori')->with('status','Data kategori berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('admin.kategori')->with('danger','Data kategori berhasil dihapus');
    }
}
