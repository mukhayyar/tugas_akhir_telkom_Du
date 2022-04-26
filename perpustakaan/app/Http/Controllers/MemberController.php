<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->input('cari');
        $member = Member::when($cari, function($query) use ($cari) {
            return $query->where('nama','like','%'.$cari.'%')->orWhere('alamat','like','%'.$cari.'%')->orWhere('no','like','%'.$cari.'%')->orWhere('kode_member','like','%'.$cari.'%');
        })->orderBy('created_at','asc')->paginate(10);
        $request = $request->all();
        return view('admin/member/index',compact('member','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/member/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Member $member)
    {
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'no' => 'required',
        ]);
        $member->kode_member = "MK".random_int(100,25000);
        $member->nama = $request->input('nama');
        $member->alamat = $request->input('alamat');
        $member->no = $request->input('no');
        $member->save();

        return redirect()->route('admin.member')->with('status','Data member berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($member)
    {
        $member = Member::with('peminjaman')->find($member);
        $total_denda = 0;
        foreach($member->peminjaman as $data){
            $total_denda += $data->denda;
        }
        $total_denda = "Rp. ".number_format($total_denda,0,",",".");
        return view('admin/member/detail',compact('member','total_denda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('admin/member/edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'no' => 'required',
        ]);
        $member->nama = $request->input('nama');
        $member->alamat = $request->input('alamat');
        $member->no = $request->input('no');
        $member->save();

        return redirect()->route('admin.member')->with('status','Data member berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('admin.member')->with('danger','Data member berhasil dihapus');
    }
}
