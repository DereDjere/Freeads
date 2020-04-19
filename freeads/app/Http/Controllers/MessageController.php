<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\User;
use App\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('message/mymessage', ['users' => $users]);
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
    public function store(Request $request)
    {
        dump($request->all());
        dump($request['GET']);
        $chaine = url()->previous();
        $extension = substr($chaine,-1,4);
        dump($extension);

        request()->validate([
            'message_send' => 'required',
        ]);
        $message = Message::create([
            'sender_id' => Auth::user()->id,
            'receveir_id' => $extension,
            'content' => $request['message_send'],
        ]);
        return redirect()->route('message.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Message::where('receveir_id', $id)->orderBy('created_at', 'DESC')->get();
        $sender = Message::where('receveir_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $users = User::all();
        return view('message/mymessage', ['users' => $users ,'detail' => $detail, 'detail_sender' => $sender, 'current_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
