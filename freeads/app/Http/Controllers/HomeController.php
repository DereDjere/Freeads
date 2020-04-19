<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Search;

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
    public function index(Request $request)
    {
        /* dump($request); */
        if(isset($request['search']))
        {
            $annonce = Search::SearchAnnonce();
           dump($annonce);
        }
        else
        {
            $annonce = Annonce::all();
        }
        return view('home', ['all_annonce' => $annonce]);
    }
    public function update()
    {
        return view('auth/update');
    }

}
