<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Tagihan;
use Alert;

class TagihanController extends Controller
{

    public function __construct(){
        $this->middleware([
           'auth',
           'privilege:admin'
        ]);
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => User::find(auth()->user()->id)
        ];
      
        return view('dashboard.entri-tagihan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      
        $message = [
            'required' => ':attribute harus di isi',
            'numeric' => ':attribute harus berupa angka',
            'min' => ':attribute minimal harus :min angka',
            'max' => ':attribute maksimal harus :max angka',
         ];
         
        $req->validate([
            'spp_bulan' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'keterangan' => 'required'
         ], $message);


         $siswa = Siswa::all();

         foreach($siswa as $val){
            Tagihan::create([
                'id_siswa' => $val->id,
                'status' => 0,
                'spp_bulan' => $req->spp_bulan,
                'jumlah_bayar' => $req->jumlah_bayar,
                'keterangan' => $req->keterangan
             ]);
         }
         
         Alert::success('Berhasil!', 'Tagihan Berhasil Dikirim!');
         
         return back();
    }   
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
}
