<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $this->validate($req, [
            'email'     =>  'required|email',
            'password'  =>  'required',
        ]);
        
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
                ], 400);
        } else {
            if (app('hash')->check($password, $user->password)) {
                $token = Auth::attempt($req->only('email','password'));
                return response()->json([
                    'status'    =>  'success',
                    'message'   =>  'Berhasil masuk',
                    'token'     =>  true,
                    'token'   =>  $token,
                    ], 200);
            } else {
                return response()->json([
                        'status'    =>  'error',
                        'message'   =>  'Password salah',
                        'token'     =>  false,
                    ], 400);
            }
        }
    }

    public function register(Request $req){
        $messages = [
            'email.unique' => 'E-Mail sudah terdaftar',
            'username.unique' => 'Nama lengkap sudah terdaftar',
        ];

        $validator = Validator::make($req->all(), [
            'username'  =>  'required|unique:users',
            'email'     =>  'required|email|unique:users'
        ], $messages);

        if ($validator->fails()) {
            $message = $validator->errors()->first('email') . ", " . $validator->errors()->first('username');

            return response()->json([
                    'status'    => 'error',
                    'message'   => $message
                ], 422);
        }

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
                ], 200);
        } else {
            return response()->json([
                'status'=>'error',
                'message'=>'Pendaftaran tidak berhasil'
                ], 400);
        }
    }

    public function logout(){
        Auth::logout(); // return null
        if (!Auth::check()) {
            return response()->json([
                'status'=>'success',
                'message'=>'Berhasil logout',
            ], 200);    
        } else {
            return response()->json([
                'status'=>'error',
                'message'=>'Tidak berhasil logout',
            ], 500);   
        }
    }

    public function testAll(){
        return response()->json(User::orderBy('created_at','desc')->take(5)->get());
    }
}
