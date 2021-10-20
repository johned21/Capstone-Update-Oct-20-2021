<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    public function registrationForm() {
       
        return view('pages.register-form');
    }

    public function loginForm() {
        return view('pages.login-form');
    }

    public function register(Request $request) {
        $request->validate([
            'firstName'             => 'required|string',
            'lastName'              => 'required|string',
            'middleName'            => 'required|string',
            'username'              => 'required|string|max:50',
            'password'              => 'required|string|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|string|min:6',
            'email'                 => 'required|email|unique:users',
        ]);

        $token = Str::random(24);

        $user = User::create([
            'firstName'         => $request->firstName,
            'lastName'          => $request->lastName,
            'middleName'        => $request->middleName,
            'email'             => $request->email,
            'username'          => $request->username,
            'password'          => bcrypt($request->password),
            'remember_token'    => $token,
        ]);

        // Mail::send('verification-email', ['user'=>$user], function($mail) use ($user){
        //     $mail->to($user->email);
        //     $mail->subject('Account Verification');
        //     $mail->from('dummy.james69@gmail.com', 'IPT Systems');
        // });   

        return redirect('/login')->with('Message', 'Your account has been created. Please check your email for the verification.');
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect()->route('login')->with('Message', 'Logged out successfully.');
    }
}
