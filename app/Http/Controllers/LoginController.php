<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function  login_post(Request $request)
    {
        request()->validate([
            'email'    => 'required|email|exists:users',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'E-posta gereklidir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin, örneğin infok@ifeelcode.com gibi.',
            'email.exists' => 'Böyle bir e-posta bulunamadı',
            'password.required' => 'Şifre gereklidir.',
            'password.min' => 'Şifreniz en az 6 karakter olmalıdır.',
        ]); //kontroller
        $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password,
        );
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', '=', $email)->first();
        if (!Hash::check($password, $user->password) ) {
            return back()->with('password1', 'Şifreniz girilen e-posta için yanlış!')->with('email_old', $email);
        }
        if (Auth::attempt($userdata)) {
            return Redirect::to('panel');
        } else {
            return back();
        }
    }

    public function logout()
    {

    }
}
