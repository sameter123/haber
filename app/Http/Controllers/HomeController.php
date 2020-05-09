<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home');
    }

    public function profil_bilgileri()
    {
        return view('backend.profil-bilgileri');
    }

    public function profil_bilgileri_post(Request $request)
    {
        request()->validate([
            'name'    => 'required',
            'last_name' => 'required',
            'email' => 'email|required',
        ], [
            'name.required' => 'Adınız gereklidir.',
            'last_name.required' => 'Soyadınız gereklidir.',
            'email.required' => 'E-postanız gereklidir.',
            'email.email' => 'E-postanız uygun bir formatta olmalıdır.',
        ]);
        DB::table('users')->where('id', Auth::user()->id)->update([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);
        return back()->with('success', 'Bilgileriniz başarıyla kaydedildi.');
    }

    public function sifre_guncelle()
    {
        return view('backend.sifre-guncelle');
    }

    public function sifre_guncelle_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:6',
            'password2' => 'required|min:6',
        ], [
            'old_password.required' => 'Eski Şifreniz gereklidir.',
            'password.required' => 'Yeni Şifreniz gereklidir.',
            'password2.required' => 'Yeni Şifrenizi tekrar yazmanız gereklidir.',
            'password2.min' => 'Yeni Şifrenizin tekrarı en az 6 karakter olmalıdır.',
            'password.min' => 'Yeni Şifreniz en az 6 karakter olmalıdır.',
        ]);
        if($request->input('password') != $request->input('password2')) {
            $validator->errors()->add('old_password', 'Yeni şifreniz ile yeni şifre tekrarınız uyuşmuyor.');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $password = $request->input('old_password');
        $user = User::where('id', Auth::user()->id)->first();
        if (!Hash::check($password, $user->password) ) {
            $validator->errors()->add('old_password', 'Eski şifreniz ile yeni şifreniz uyuşmuyor. Güvenlik nedeniyle şifrenizi değiştirebilmek için eski şifrenize ihtiyacımız var.');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            DB::table('users')->where('id', Auth::user()->id)->update([
                'password' => bcrypt(request()->password),
            ]);
            return back()->with('success', 'Şifreniz başarıyla kaydedildi');
        }

    }

    public function ayarlar()
    {
        return view('backend.ayarlar');
    }

    public function ayarlar_post(Request $request)
    {
        request()->validate([
            'site_name'    => 'required',
            'robots' => 'required',
            'description' => 'required|min:15|max:158',
            'email' => 'required|email'
        ], [
            'site_name.required' => 'Site adını yazmanız gereklidir.',
            'robots.required' => 'Robotların nasıl davranacağı bilgisine ihtiyaç duyuyoruz.',
            'email.required' => 'E-postanız gereklidir.',
            'email.email' => 'E-postanız uygun bir formatta olmalıdır.',
            'description.required' => 'Site açıklaması girin, en az 15 en fazla 158 karakter olmalı.',
            'description.min' => 'Site açıklamanız en az 15 karakter içermelidir.',
            'description.max' => 'Site açıklamanız en fazla 158 karakter içerebilir'
        ]);
        if(isset($request->favicon)) {
            request()->validate([
                'favicon' => 'image'
            ], [
                'favicon.image' => 'Favicon bir resim olmalıdır (Jpg, jpeg, png, ico)',
            ]);
            $info = getimagesize($request->favicon);
            $extension = image_type_to_extension($info[2]);
            $imageName = time().$extension;
            $request->favicon->move(public_path('img'), $imageName);
            DB::table('settings')->where('id', 1)->update(['favicon' => $imageName]);
        }
        if(isset($request->logo)) {
            request()->validate([
                'logo' => 'image'
            ], [
                'logo.image' => 'Logo bir resim olmalıdır (Jpg, jpeg, png, ico)',
            ]);
            $info = getimagesize($request->logo);
            $extension = image_type_to_extension($info[2]);
            $imageName = time().$extension;
            $request->logo->move(public_path('img'), $imageName);
            DB::table('settings')->where('id', 1)->update(['logo' => $imageName]);
        }
        DB::table('settings')->where('id', '1')->update([
            'site_name' => $request->input('site_name'),
            'description' => $request->input('description'),
            'robots' => $request->input('robots'),
            'analytics' => $request->analytics,
            'meta' => $request->meta,
            'footer_text' => $request->footer_text,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'email' => $request->email,
            'tel1' => $request->tel1,
            'tel2'=> $request->tel2,
            'adres1' => $request->adres1,
            'adres2' => $request->adres2
        ]);
        return back()->with('success', 'Site bilgileri başarıyla güncellendi.');
    }

    public function uyeler()
    {
        return view('backend.uyeler');
    }

    public function uye_ekle()
    {
        return view('backend.uye-ekle');
    }

    public function uye_ekle_post(Request $request)
    {
        request()->validate([
            'name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password2' => 'required|min:6',
        ], [
            'name.required' => 'İsminiz gereklidir.',
            'name.min' => 'Adınız en az 2 karakter olmalıdır.',
            'name.max' => 'Adınız en fazla 50 karakter olabilir.',
            'last_name.required' => 'Kullanıcı adı gereklidir.',
            'last_name.min' => 'Kullanıcı adınız en az 2 karakter olmalıdır.',
            'last_name.max' => 'Kullanıcı adınız en fazla 50 karakter olabilir.',
            'email.required' => 'E-posta gereklidir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin, örneğin info@ifeelcode.com gibi.',
            'email.unique' => 'Bu e-posta ile kayıtlı başka bir hesap bulunuyor. Lütfen başka bir e-posta adresi girin yada hesabınızı geri almak için şifremi unuttum sayfasını ziyaret edin.',
            'password.required' => 'Şifre gereklidir.',
            'password.min' => 'Şifreniz en az 6 karakter olmalıdır.',
            'password2.required' => 'Lütfen şifre onayınızı yazın.',
            'password2.min' => 'Şifre onayınız en az 6 karakter olmalıdır.',
        ]);

        $user= new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->last_name = $request->last_name;
        $user->password=bcrypt(request()->password);
        $user->save();

        return redirect('uyeler')->with('success', 'Yeni üye başarıyla eklendi.');
    }

    public function uye_duzenle($ne)
    {
        return view('backend.uye-duzenle')->with('id', $ne);
    }

    public function uye_duzenle_post(Request $request)
    {
        request()->validate([
            'name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
        ], [
            'name.required' => 'İsminiz gereklidir.',
            'name.min' => 'Adınız en az 2 karakter olmalıdır.',
            'name.max' => 'Adınız en fazla 50 karakter olabilir.',
            'last_name.required' => 'Kullanıcı adı gereklidir.',
            'last_name.min' => 'Kullanıcı adınız en az 2 karakter olmalıdır.',
            'last_name.max' => 'Kullanıcı adınız en fazla 50 karakter olabilir.',
            'email.required' => 'E-posta gereklidir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin, örneğin info@ifeelcode.com gibi.',
        ]);
        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);
        if($request->password != '') {
            DB::table('users')->where('id', $request->id)->update([
                'password' => bcrypt(request()->password),
            ]);
        }
        return redirect('uyeler')->with('success', 'Üye başarıyla düzenlendi.');
    }

    public function haberler()
    {
        return view('backend.haberler');
    }

    public function haber_ekle()
    {
        return view('backend.haber-ekle');
    }

    public function haber_ekle_post(Request $request)
    {
        request()->validate([
            'title'    => 'required',
            'text' => 'required',
            'image' => 'image|required',
        ], [
            'title.required' => 'Haber başlığı yazmanız gereklidir.',
            'image.image' => 'Haber kapak görseli bir resim olmalıdır (Jpg, jpeg, png)',
            'image.required' => 'Haber için kapak görseli seçmelisiniz!.',
            'text.required' => 'Haber açıklamanızı yazmanız zorunludur.'
        ]);
        $info = getimagesize($request->image);
        $extension = image_type_to_extension($info[2]);
        $imageName = time().'.'.$extension;
        $url = Str::slug($request->input('title'), '-');
        $request->image->move(public_path('img'), $imageName);
        DB::table('blog')->insert([
            'title' => $request->input('title'),
            'title_2' => $request->input('title_2'),
            'text' => $request->input('text'),
            'image' => $imageName,
            'url' => '/haber/'.$url,
        ]);
        return redirect('haberler')->with('success', 'Yeni haber başarıyla eklendi.');
    }

    public function haber_duzenle($ne)
    {
        return view('backend.haber-duzenle')->with('id', $ne);
    }

    public function haber_duzenle_post(Request $request)
    {
        request()->validate([
            'title'    => 'required',
            'text' => 'required',
        ], [
            'title.required' => 'Haber başlığı yazmanız gereklidir.',
            'text.required' => 'Haber açıklamanızı yazmanız zorunludur.'
        ]);
        if(isset($request->image)) {
            request()->validate([
                'image' => 'image|required',
            ], [
                'image.image' => 'Haber kapak görseli bir resim olmalıdır (Jpg, jpeg, png)',
                'image.required' => 'Haber için kapak görseli seçmelisiniz!.',
            ]);
            $info = getimagesize($request->image);
            $extension = image_type_to_extension($info[2]);
            $imageName = time().'.'.$extension;
            $request->image->move(public_path('img'), $imageName);
            DB::table('blog')->where('id', $request->id)->update([
                'image' => $imageName,
            ]);
        }
        DB::table('blog')->where('id', $request->id)->update([
            'title' => $request->input('title'),
            'title_2' => $request->input('title_2'),
            'text' => $request->input('text'),
        ]);
        return redirect('haberler')->with('success', 'Haber başarıyla düzenlendi.');
    }

    public function urunler()
    {
        return view('backend.urunler');
    }

    public function urun_ekle()
    {
        return view('backend.urun-ekle');
    }

    public function urun_ekle_post(Request $request)
    {
        request()->validate([
            'title'    => 'required',
            'image' => 'image|required',
        ], [
            'title.required' => 'Başlık yazmanız gereklidir.',
            'image.image' => 'Seçilen görsel bir resim olmalıdır (Jpg, jpeg, png)',
            'image.required' => 'Görsel seçmelisiniz!.',
        ]);
        $info = getimagesize($request->image);
        $extension = image_type_to_extension($info[2]);
        $imageName = time().'.'.$extension;
        $request->image->move(public_path('img'), $imageName);
        $url = Str::slug($request->input('title'), '-');
        DB::table('slider')->insert([
            'title' => $request->input('title'),
            'title_2' => $request->input('title_2'),
            'text' => $request->input('text'),
            'image' => $imageName,
            'url' => $url,
        ]);
        return redirect('urunler')->with('success', 'Yeni ürün başarıyla eklendi.');
    }

    public function urun_duzenle($ne)
    {
        return view('backend.urun-duzenle')->with('id', $ne);
    }

    public function urun_duzenle_post(Request $request)
    {
        request()->validate([
            'title'    => 'required',
        ], [
            'title.required' => 'Başlık yazmanız gereklidir.',
        ]);
        if(isset($request->image)) {
            request()->validate([
                'image' => 'image|required',
            ], [
                'image.image' => 'Seçilen görsel bir resim olmalıdır (Jpg, jpeg, png)',
                'image.required' => 'Görsel seçmelisiniz!.',
            ]);
            $info = getimagesize($request->image);
            $extension = image_type_to_extension($info[2]);
            $imageName = time().'.'.$extension;
            $request->image->move(public_path('img'), $imageName);
            DB::table('urunler')->where('id', $request->id)->update([
                'image' => $imageName,
            ]);
        }
        DB::table('urunler')->where('id', $request->id)->update([
            'title' => $request->input('title'),
            'title_2' => $request->input('title_2'),
            'text' => $request->input('text'),
        ]);
        return redirect('urunler')->with('success', 'Ürün başarıyla düzenlendi.');
    }

    public function projeler()
    {
        return view('backend.projeler');
    }

    public function proje_ekle()
    {
        return view('backend.proje-ekle');
    }

    public function proje_ekle_post(Request $request)
    {
        request()->validate([
            'title'    => 'required',
            'title_2' => 'required',
            'urun' => 'required',
            'image' => 'image|required',
        ], [
            'title.required' => 'Başlık yazmanız gereklidir.',
            'title_2.required' => 'Alt başlık yazmanız gereklidir.',
            'urun.required' => 'Çalışmanın ait olduğu ürünü seçin.',
            'image.image' => 'Seçilen görsel bir resim olmalıdır (Jpg, jpeg, png)',
            'image.required' => 'Görsel seçmelisiniz!.',
        ]);
        $info = getimagesize($request->image);
        $extension = image_type_to_extension($info[2]);
        $imageName = time().'.'.$extension;
        $request->image->move(public_path('img'), $imageName);
        $url = Str::slug($request->input('title'), '-');
        DB::table('projeler')->insert([
            'title' => $request->input('title'),
            'title_2' => $request->input('title_2'),
            'text' => $request->input('text'),
            'image' => $imageName,
            'url' => $url,
            'urun' => $request->input('urun'),
        ]);
        return redirect('projeler')->with('success', 'Yeni çalışma başarıyla eklendi.');
    }

    public function proje_duzenle($ne)
    {
        return view('backend.proje-duzenle')->with('id', $ne);
    }

    public function proje_duzenle_post(Request $request)
    {
        request()->validate([
            'title'    => 'required',
            'title_2' => 'required',
            'urun' => 'required',
        ], [
            'title.required' => 'Başlık yazmanız gereklidir.',
            'title_2.required' => 'Alt başlık yazmanız gereklidir.',
            'urun.required' => 'Çalışmanın ait olduğu ürünü seçin.',
        ]);
        if(isset($request->image)) {
            request()->validate([
                'image' => 'image|required',
            ], [
                'image.image' => 'Seçilen görsel bir resim olmalıdır (Jpg, jpeg, png)',
                'image.required' => 'Görsel seçmelisiniz!.',
            ]);
            $info = getimagesize($request->image);
            $extension = image_type_to_extension($info[2]);
            $imageName = time().'.'.$extension;
            $request->image->move(public_path('img'), $imageName);
            DB::table('projeler')->where('id', $request->id)->update([
                'image' => $imageName,
            ]);
        }
        DB::table('projeler')->where('id', $request->id)->update([
            'title' => $request->input('title'),
            'title_2' => $request->input('title_2'),
            'text' => $request->input('text'),
            'urun' => $request->input('urun'),
        ]);
        return redirect('projeler')->with('success', 'Proje başarıyla düzenlendi.');
    }

    public function slider()
    {
        return view('backend.slider');
    }

    public function slider_ekle()
    {
        return view('backend.slider-ekle');
    }

    public function slider_ekle_post(Request $request)
    {
        request()->validate([
            'title'    => 'required',
            'image' => 'image|required',
        ], [
            'title.required' => 'Başlık yazmanız gereklidir.',
            'image.image' => 'Seçilen görsel bir resim olmalıdır (Jpg, jpeg, png)',
            'image.required' => 'Görsel seçmelisiniz!.',
        ]);
        $info = getimagesize($request->image);
        $extension = image_type_to_extension($info[2]);
        $imageName = time().'.'.$extension;
        $request->image->move(public_path('img'), $imageName);
        DB::table('slider')->insert([
            'title' => $request->input('title'),
            'title_2' => $request->input('title_2'),
            'image' => $imageName,
        ]);
        return redirect('slider')->with('success', 'Yeni slider başarıyla eklendi.');
    }

    public function slider_duzenle($ne)
    {
        return view('backend.slider-duzenle')->with('id', $ne);
    }

    public function slider_duzenle_post(Request $request)
    {
        request()->validate([
            'title'    => 'required',
        ], [
            'title.required' => 'Başlık yazmanız gereklidir.',
        ]);
        if(isset($request->image)) {
            request()->validate([
                'image' => 'image|required',
            ], [
                'image.image' => 'Seçilen görsel bir resim olmalıdır (Jpg, jpeg, png)',
                'image.required' => 'Görsel seçmelisiniz!.',
            ]);
            $info = getimagesize($request->image);
            $extension = image_type_to_extension($info[2]);
            $imageName = time().'.'.$extension;
            $request->image->move(public_path('img'), $imageName);
            DB::table('slider')->where('id', $request->id)->update([
                'image' => $imageName,
            ]);
        }
        DB::table('slider')->where('id', $request->id)->update([
            'title' => $request->input('title'),
            'title_2' => $request->input('title_2'),
        ]);
        return redirect('slider')->with('success', 'Silder başarıyla düzenlendi.');
    }


    public function hakkimizda_yonetim()
    {
        return view('backend.hakkimizda-yonetim');
    }

    public function hakkimizda_yonetim_post(Request $request)
    {
        request()->validate([
            'title'    => 'required',
            'text' => 'required',
        ], [
            'title.required' => 'Haber başlığı yazmanız gereklidir.',
            'text.required' => 'Haber açıklamanızı yazmanız zorunludur.'
        ]);
        if(isset($request->image)) {
            request()->validate([
                'image' => 'image|required',
            ], [
                'image.image' => 'Hakkımızda kapak görseli bir resim olmalıdır (Jpg, jpeg, png)',
                'image.required' => 'Hakkımızda için kapak görseli seçmelisiniz!.',
            ]);
            $info = getimagesize($request->image);
            $extension = image_type_to_extension($info[2]);
            $imageName = time().'.'.$extension;
            $request->image->move(public_path('img'), $imageName);
            DB::table('hakkimizda')->where('id', '1')->update([
                'image' => $imageName,
            ]);
        }
        DB::table('hakkimizda')->where('id', '1')->update([
            'title' => $request->input('title'),
            'title_2' => $request->input('title_2'),
            'text' => $request->input('text'),
        ]);
        return back()->with('success', 'Hakkımızda başarıyla düzenlendi');
    }

    public function api_iletForm(Request $request)
    {
        $data = array(
            'gonderen'=>'1',
            'baslik'=>$request->input('baslik'),
            'aciklama'=>$request->input('aciklama')
        );
        $urlEk = http_build_query($data);
        $url = "http://ifeelcode.com/api/formlar/hata?".$urlEk;
        $client = new \GuzzleHttp\Client();
        try {
            $gonderim = $client->get($url);
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
        }

        $response = json_decode($gonderim->getBody());
        if($response == '200') {
            return back()->with('success_form', 'Hata bildiriminiz teknik destek ekibine iletilmiştir. En kısa sürede konuyla alakalı dönüş yapılacaktır.');
        } else {
            return back()->with('error_form', 'Hata bildiriminiz teknik destek ekibine iletilirken bir sorunla karşılaşıldı. Teknik ekibimiz bu durumdan haberdar edildi.');
        }
    }
}
