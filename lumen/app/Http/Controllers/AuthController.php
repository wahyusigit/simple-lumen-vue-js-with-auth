<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login(Request $req){
        $username = $req->input('username');
        $email = $req->input('email');
        $password = $req->input('password');

        // Check jika sudah login
        // if (Auth::check()) {
        //     return response()->json([
        //         'status'    =>  'error',
        //         'message'   =>  'User sudah login'
        //     ]);
        // } 

        $user = User::where('email',$email)->first();

        if (!$user) {
            return response()->json([
                'status'    =>  'error',
                'message'   =>  'Email tidak terdaftar',
                'token'     =>  false,
                ]);
        } else {
            if (app('hash')->check($password, $user->password)) {
                $token = Auth::attempt($req->only('email','password'));
                return response()->json([
                    'status'    =>  'success',
                    'message'   =>  'Berhasil masuk',
                    'token'     =>  true,
                    'token'   =>  $token,
                    ]);
            } else {
                return response()->json([
                        'status'    =>  'error',
                        'message'   =>  'Password salah',
                        'token'     =>  false,
                    ]);
            }
            
        }
    }

    public function register(Request $req){
        $this->validate($req, [
            'username'  =>  'required|unique:users',
            'email'     =>  'required|email|unique:users'
        ]);

        $username = $req->input('username');
        $email = $req->input('email');
        $password = app('hash')->make($req->input('password'));

        $user = User::create([
            'username'  => $username,
            'email'     => $email,
            'password'  => $password
        ]);

        if ($user) {
            return response()->json([
                'status'=>'success',
                'message'=>'Pendaftaran berhasil'
                ]);
        } else {
            return response()->json([
                'status'=>'error',
                'message'=>'Pendaftaran tidak berhasil'
                ]);
        }
    }

    public function logout(){
        Auth::logout(); // return null
        if (!Auth::check()) {
            return response()->json([
                'status'=>'success',
                'message'=>'Berhasil logout',
            ]);    
        } else {
            return response()->json([
                'status'=>'error',
                'message'=>'Tidak berhasil logout',
            ]);   
        }
    }
}
