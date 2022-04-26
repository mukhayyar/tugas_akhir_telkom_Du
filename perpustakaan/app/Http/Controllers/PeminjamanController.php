<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->input('cari');
        if($cari >= 0 || $cari <= 10000){
            $member = Member::when($cari, function($query) use ($cari) {
                return $query->where('nama','like','%'.$cari.'%');
            })->paginate(3);
            $buku = Buku::when($cari, function($query) use ($cari) {
                return $query->where('judul','like','%'.$cari.'%');
            })->paginate(3);
        }
        if(empty($member->items())) {
            $member = "";
        } else if($member->total() != 0 ){
            $member = $member->get(0)->id;
        } else {
            $member = "";
        }
        if(empty($buku->items())) {
            $buku = "";
        }else if($buku->total() != 0){
            $buku = $buku->get(0)->id;
        } else {
            $buku = "";
        }
        $peminjaman = Peminjaman::with(['buku','member'])->when([$cari,$buku,$member], function($query) use ($cari,$buku,$member) {
            return $query->where('member_id','=',$member)->orWhere('buku_id','=',$buku)->orWhere('tgl_pinjam','like','%'.$cari.'%')->orWhere('tgl_kembali','like','%'.$cari.'%');
        })->paginate(10);
        $request = $request->all();
        return view('admin/peminjaman/index',compact('peminjaman','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::where('kuota_peminjaman','>',0)->get();
        $buku = Buku::where('stok','>',0)->get();
        return view('admin/peminjaman/tambah',compact('member','buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->member_id = $request->input('member');
        $peminjaman->buku_id = $request->input('buku');
        $peminjaman->tgl_pinjam = $request->input('tgl_pinjam');
        $peminjaman->save();

        // mengganti value buku dari tidak dipinjam ke meminjam
        $buku = Buku::find($request->input('buku'));
        $buku->stok -= 1;
        $buku->save();

        $member = Member::find($request->input('member'));
        $member->kuota_peminjaman -= 1;
        $member->save();

        return redirect()->route('admin.peminjaman')->with('status','Data peminjaman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($peminjaman)
    {
        $peminjaman = Peminjaman::with(['member','buku'])->find($peminjaman);
        return view('admin/peminjaman/detail',compact('peminjaman'));
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('admin.peminjaman')->with('status','Data peminjaman berhasil dihapus');
    }

    private function hitungHari($tgl1,$tgl2){
        $perbedaan = strtotime($tgl2) - strtotime($tgl1);

        return (abs(round($perbedaan / 86400))) - 6;
    }

    public function kembaliPeminjaman(Request $request, Peminjaman $peminjaman)
    {
        $hari_ini = date("Y-m-d");
        $selisih_hari = $this->hitungHari($hari_ini, $peminjaman->tgl_pinjam);
        if($selisih_hari <= 0){
            $peminjaman->tgl_kembali = $hari_ini;
            $peminjaman->denda = 0;
            $peminjaman->save();

            $buku = Buku::find($peminjaman->buku_id);
            $buku->stok += 1;
            $buku->save();

            $member = Member::find($peminjaman->member_id);
            $member->kuota_peminjaman += 1;
            $member->save();
            return redirect()->route('admin.peminjaman')->with('status','Buku dikembalikan tanpa denda');
        } else {
            $denda = $selisih_hari * 1000;
            $peminjaman->tgl_kembali = $hari_ini;
            $peminjaman->denda = $denda;
            $peminjaman->save();

            $buku = Buku::find($peminjaman->buku_id);
            $buku->stok += 1;
            $buku->save();

            $member = Member::find($peminjaman->member_id);
            $member->kuota_peminjaman += 1;
            $member->save();
            return redirect()->route('admin.peminjaman')->with('warning','Buku dikembalikan dengan denda Rp.'.number_format($denda,0,",","."));
        }
    }
}
