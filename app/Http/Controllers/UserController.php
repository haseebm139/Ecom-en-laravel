<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
    public function index(){
        return view('login');
    }

    static function login(Request $req)
    {
        $user = User::where(['email'=>$req->email])->first();
        if (!$user || !Hash::check($req->password, $user->password)){

            return redirect('/');
        } else {
            // Session::put('user',$user);
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }

    public function register(Request $request){

        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =Hash::make($request->password);
        $user->save();
        return redirect('/login');
    }
}
