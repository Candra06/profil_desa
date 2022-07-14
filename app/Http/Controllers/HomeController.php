<?php

namespace App\Http\Controllers;

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
        return view('app.frontend.layanan');
    }
}
