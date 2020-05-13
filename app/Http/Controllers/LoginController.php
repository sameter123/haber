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
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin, örneğin info@ifeelcode.com gibi.',
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
        if (Auth::attempt($userdata,$request->remember)) {
            return Redirect::to('panel');
        } else {
            return back()->with('hata', 'Girdiğiniz bilgiler yanlış, lütfen kontrol edin!');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function register_post(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ], [
            'name.required' => 'Adınız gereklidir',
            'last_name.required' => 'Soyadınız gereklidir.',
            'email.required' => 'E-posta gereklidir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin.',
            'email.unique' => 'Böyle bir e-posta zaten var',
            'password.required' => 'Şifre gereklidir.',
            'password.min' => 'Şifreniz en az 6 karakter olmalıdır.',
            'password_confirmation.required' => 'Lütfen şifre onayınızı yazın.',
            'password_confirmation.min' => 'Şifre onayınız en az 6 karakter olmalıdır.',
            'password.confirmed' => 'Şifre onayını yanlış yazdınız. Lütfen yazarken daha yavaş olmayı ve harfleri görerek yazmayı deneyin.',
        ]);
        $user= new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->last_name = $request->last_name;
        $user->telefon = $request->telefon;
        $user->password=bcrypt($request->password);
        $user->save();
        $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password,
        );
        if (Auth::attempt($userdata)) {
            return Redirect::to('/panel');
        } else {
            return Redirect::to('/giris')->with('success', 'Hesabınız başarıyla oluşturuldu. Giriş bilgileriniz ile giriş yapabilirsiniz.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
