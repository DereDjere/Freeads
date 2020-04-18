<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Image;
use Illuminate\Http\Request;

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
        $annonce = Annonce::all();
       
        return view('home', ['all_annonce' => $annonce]);
    }
    public function update()
    {
        return view('auth/update');
    }

}
