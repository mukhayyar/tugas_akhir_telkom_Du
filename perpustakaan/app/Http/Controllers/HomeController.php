<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $peminjaman = Peminjaman::where('tgl_pinjam',date("Y-m-d"))->get();
        $dikembalikan = Peminjaman::where('tgl_kembali','!=',"")->count();
        $total_peminjaman = Peminjaman::count();
        if($total_peminjaman){
            $persendikembalikan = abs(round($dikembalikan/$total_peminjaman  * 100));
        }
        $persendikembalikan = 0;
        $dipinjam = $total_peminjaman-$dikembalikan;
        $user_terdaftar = Member::count();
        $denda_didapat = Peminjaman::sum('denda');
        return view('admin/dashboard',compact('denda_didapat','user_terdaftar','persendikembalikan','dipinjam','peminjaman'));
    }

    public function setting()
    {
        return view('admin/setting');
    }

    public function setting_update(Request $request)
    {
        $user_auth = Auth::user()->id;
        $data = User::find($user_auth);
        if($request->password == $request->password_confirm){
            if($request->password == $request->old_password){
                return redirect()->route('home.setting')->with('alert','Password baru sama dengan password lama');
            } else {
                if(Hash::check($request->old_password, $data->password)){
                    $data->password = Hash::make($request->password_confirm);
                    $data->save();
                    return redirect()->route('home.setting')->with('success','Password berhasil diganti');
                } else {
                    return redirect()->route('home.setting')->with('alert','Salah memasukkan password lama');
                }
            }
        }
        else {
            return redirect()->route('home.setting')->with('alert','Konfirmasi password salah');
        }
    }
}
