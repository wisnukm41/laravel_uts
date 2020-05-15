<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    protected $username = 'username';

    public function index()
    {
        if(!Auth::check()){
            return view('login');
        } return redirect()->route('admin-dashboard');
    }

    public function registration()
    {
       return view('registration');
    }

    public function postLogin(Request $req)
    {
        $credentials = $req->only('username','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('admin-dashboard');
        }
        return Redirect::to("login")->with('status','Username atau Password Salah!');
    }

    public function postRegistration(Request $req)
    {
        request()->validate([
            'username' => 'required|min:5|unique:users',
            'password' => 'required|min:5',
            ]);

        $data = $req->all();

        $check = $this->create($data);

        return Redirect::to('dashboard')->withSuccess('Login Berhasil!');
    }

    public function create(array $data)
    {
        return User::create([
            'username'=>$data['username'],
            'password'=> Hash::make($data['password']),
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
