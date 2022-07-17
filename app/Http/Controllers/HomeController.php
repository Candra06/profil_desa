<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\GaleriDusun;
use App\Models\Pelayanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function frontend()
    {
        return view('app.frontend.index');
    }

    public function profil()
    {
        return view('app.frontend.profile');
    }

    public function layanan()
    {
        $data = Pelayanan::all();
        return view('app.frontend.layanan', compact('data'));
    }

    public function dusun()
    {
        $data = [];
        $dusun = Dusun::all();
        foreach ($dusun as $ds) {
            $tmpGaleri = GaleriDusun::where('dusun_id', $ds->id)->get();
            $tmp['nama_dusun'] = $ds->nama_dusun;
            $tmp['kepala_dusun'] = $ds->kepala_dusun;
            $tmp['deskripsi'] = $ds->deskripsi;
            $tmp['galeri'] = $tmpGaleri;

            array_push($data, $tmp);
        }
            // return $data;
        return view('app.frontend.dusun', compact('data'));
    }
}
