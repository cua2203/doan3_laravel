<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('Admin.Login',[
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function register(Request $request){
        $user = new User();
        $user->email=$request->email;
        $user->password = bcrypt($request->password);
        $user->Role=1;
        $user->full_name=$request->name;
        $user->save();

        if (Auth::attempt(['email' => $request->email,'password' => $request->password ])){
            return Redirect()->route('HotSale');
        }
    }
    public function Authenticate(Request $request){
        // dd($request->input());
        // $this->validate($request,[
        //     'email'=> 'required|email:filter',
        //     'password'=> 'required'
        // ]);
 
        if (Auth::attempt(['email' => $request->email,'password' => $request->password ])){
            return Redirect()->route('HotSale');
        }
        // echo("sai");
        // Session::flash('error', "Email hoặc password không đúng vui lòng nhập lại");
        return Redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return Redirect()->route('login');
    }
    //
}
