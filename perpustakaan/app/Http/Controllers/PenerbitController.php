<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->input('cari');
        $penerbit = Penerbit::when($cari, function($query) use ($cari) {
            return $query->where('nama','like','%'.$cari.'%')->orWhere('lokasi','like','%'.$cari.'%');
        })->paginate(5);
        $request = $request->all();
        return view('/admin/penerbit/index',compact('penerbit','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/penerbit/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Penerbit $penerbit)
    {
        $this->validate($request,[
            'nama' => 'required',
            'lokasi' => 'required',
        ]);

        $penerbit->nama = $request->input('nama');
        $penerbit->lokasi = $request->input('lokasi');
        $penerbit->save();

        return redirect()->route('admin.penerbit')->with('status','Data penerbit berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($penerbit)
    {
        $penerbit = Penerbit::with('buku')->find($penerbit);
        return view('admin/penerbit/detail',compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        return view('/admin/penerbit/edit',compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        $this->validate($request,[
            'nama' => 'required',
            'lokasi' => 'required',
        ]);

        $penerbit->nama = $request->input('nama');
        $penerbit->lokasi = $request->input('lokasi');
        $penerbit->update();

        return redirect()->route('admin.penerbit')->with('status','Data penerbit berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();
        return redirect()->route('admin.penerbit')->with('danger','Data penerbit berhasil dihapus');
    }
}
