<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function Updatelist(Request $request)
    {
        if (auth()->guest()) {
            return redirect('/login');
        }

        UpdateController::ChangeName($request['name']);
        UpdateController::Changepassword($request['password']);
        UpdateController::ChangeEmail($request['email']);

        return view('auth/update', ['message' => 'Modification pris en compte']);
    }
    public function Changepassword($password)
    {
        if (empty($password)) {
            return false;
        } else {
            $user = auth()->user();
            $user->password = bcrypt($password);
            $user->save();
        }
    }
    public function ChangeEmail($email)
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);
        $user = auth()->user();
        $user->email = $email;
        $user->save();   
    }
    public function ChangeName($name)
    {
        request()->validate([
            'name' => ['required']
        ]);
        $user = auth()->user();
        $user->name = $name;
        $user->save();
    }
}
