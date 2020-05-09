<?php
namespace App\Http\Controllers;
use Request;
use Auth;
use Redirect;
use App\User;
use Hash;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class MainController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function login_post(Request $request)
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
        ]);
        $input = Request::only('email', 'password');
        $userdata = array(
        'email'     => $input['email'],
        'password'  => $input['password']
    );
        $email = $input['email'];
        $password = $input['password'];
        $user = User::where('email', '=', $email)->first();
        if (!Hash::check($password, $user->password) ) {
            return back()->with('password1', 'Şifreniz girilen e-posta için yanlış!')->with('email_old', $email);
        }


        if (Auth::attempt($userdata)) {
        return Redirect::to('anasayfa');
        } else {
        return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('giris');
    }

    public function reset_pass()
    {
        return view('backend.reset');
    }

    public function reset_pass_post(Request $request)
    {
        request()->validate([
        'email'    => 'required|email|exists:users'
        ], [
            'email.required' => 'E-posta gereklidir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin, örneğin infok@ifeelcode.com gibi.',
            'email.exists' => 'Böyle bir e-posta bulunamadı!',
        ]);
        $input = Request::only('email');
        $email = $input['email'];

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => Str::random(40),
            'created_at' => Carbon::now()
        ]);
        $tokenData = DB::table('password_resets')->where('email', $email)->first();
        $user = DB::table('users')->where('email', $email)->first();
        $token = $tokenData->token;

        $to_name = "".$user->name." ".$user->last_name;
        $to_email = $email;
        $data = array('name'=>"I Feel Code", "body" => "Şifre Yenileme Talebi - I Feel Code", 'email'=>$email, 'token'=>$token);
        $gonderim = Mail::send('emails.reset', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Şifre Yenileme Talebi - I Feel Code');
            $message->from('no-reply@ifeelcode.com','Şifre Yenileme Talebi - I Feel Code');
        });

        if (!$gonderim) {
            return redirect()->back()->with('status', trans('E-posta başarıyla gönderildi, lütfen gelen kutunuzu kontrol edin. Yeni bir e-posta isteğinde bulunmadan önce 2-3 dakika bekleyiniz.'));
        } else {
            return redirect()->back()->with('error', trans('Bir hata meydana geldi. Tekrar deneyin.'));
        }
    }

    public function rewrite_pass()
    {
        return view('backend.yenile');
    }

    public function rewrite_pass_post(Request $request)
    {
        request()->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|max:20',
            'email' => 'required|exists:users|email',
            'key' => 'required|exists:password_resets,token',
        ], [
            'password.required' => 'Şifre gereklidir.',
            'password.min' => 'Şifreniz en az 6 karakter olmalıdır.',
            'password_confirmation.required' => 'Lütfen şifre onayınızı yazın.',
            'password_confirmation.min' => 'Şifre onayınız en az 6 karakter olmalıdır.',
            'password_confirmation.max' => 'Şifre onayınız en fazla 20 karakter olabilir.',
            'password.confirmed' => 'Şifre onayını yanlış yazdınız. Lütfen yazarken daha yavaş olmayı ve harfleri görerek yazmayı deneyin.',
            'email.required' => 'E-posta gereklidir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin, örneğin infok@ifeelcode.com gibi.',
            'email.exists' => 'Böyle bir e-posta bulunamadı!',
            'key.required' => 'Güvenlik anahtarınız kayıp!.',
            'key.exists' => 'Güvenlik anahtarınız uyuşmuyor!',
        ]);
        $input = Request::only('password', 'password_confirmation', 'email');
        $update = DB::table('users')->where('email', $input['email'])->update([
            'password' => bcrypt($input['password'])
        ]);
        $userdata = array(
        'email'     => $input['email'],
        'password'  => bcrypt($input['password'])
        );
        if (Auth::attempt($userdata)) {
        return Redirect::to('anasayfa');
        } else {
        return Redirect::to('giris');
        }
    }

    public function urun($urun)
    {
        return view('urun')->with('urun', $urun);
    }

    public function calisma($calisma)
    {
        return view('calisma')->with('calisma', $calisma);
    }

    public function haber($haber)
    {
        return view('haber')->with('haber', $haber);
    }
}
?>
