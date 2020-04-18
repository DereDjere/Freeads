<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Image;
use App\Annonce;

class MyAnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('annonces')->where('user_id', Auth::user()->id)->get();
        return view('annonce/myposting', ['annonces' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonce/create_posting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array_img = [];
        $image = $request->file('picture');
        if (isset($image) && !empty($image)) {
            foreach ($image as $img) {
                $new_name = rand() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path("images"), $new_name);
                array_push($array_img, $new_name);
            }
        }

        $name_img = implode(',', $array_img);

        request()->validate([
            'name' => 'required',
            'content' => 'required',
            'price' => 'digits_between:0,999999999',
            'picture' => 'required',
        ]);

        $annonce = Annonce::create([
            'user_id' => Auth::user()->id,
            'name' => $request['name'],
            'content' => $request['content'],
            'price' => intval($request['price']),
        ]);

        Image::create([
            'url_image' => $name_img,
            'annonce_id' => $annonce->id,
        ]);
        return view('annonce/myposting', ['alert' => 'Votre annonce a etait ajouter']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Annonce::where('id', $id)->get();
        return view('annonce/updateposting', ['detail' => $detail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        request()->validate([
            'name' => 'required',
            'content' => 'required',
            'price' => 'digits_between:0,999999999',
        ]);
        $table = DB::table('annonces')->where('id', $id);
        $table->update([
            'name' => $request->name,
            'content' => $request->content,
            'price' => $request->price,

        ]);
        return redirect()->route('myannonce.index')->with('message','Annonce modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dump('delete');
        $annonce = Annonce::where('id',$id);
        $image = Image::where('annonce_id',$id);

        $annonce->delete();
        $image->delete();
        return redirect()->route('myannonce.index')->with('message','Annonce supprimer avec succes');
    }
}
