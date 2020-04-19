<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Search extends Controller
{
    public static function SearchAnnonce()
    {
        $input = request()->input('search');
        $search_annonce = DB::table('annonces')->where('name', 'like', "%$input%")->orWhere('content','like',"%$input%")->get();
        /* Annonce::where('name','like',"%$input%"); */
        /* ->orWhere('content','like',"%$input%") */
        return $search_annonce;
    }
    public static function MostRecent()
    {
        
    }
    public static function CritereSearch()
    {

    }
}
