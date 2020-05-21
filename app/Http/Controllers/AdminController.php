<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// atom://teletype/portal/8b6755e5-0602-4c23-827c-fcb298e3ac44
class AdminController extends Controller
{
    public function index()
    {
        return view('backend.home'); //index sayfası
    }

    public function settings()
    {
        return view('backend.settings');
    }

    public function settings_post(Request $request)
    {
        $settings = DB::table('settings')->first();
        if(isset($request->site_name)) {
            $site_name = $request->site_name;
        } else {
            $site_name = $settings->site_name;
        }

        if(isset($request->site_description)) {
            $site_description = $request->site_description;
        } else {
            $site_description = $settings->site_description;
        }

        if(isset($request->robots)) {
            $robots = $request->robots;
        } else {
            $robots = $settings->robots;
        }

        if(isset($request->analytics)) {
            $analytics = $request->analytics;
        } else {
            $analytics = $settings->analytics;
        }

        if(isset($request->meta_tag )) {
            $meta_tag = $request->meta_tag ;
        } else {
            $meta_tag = $settings->meta_tag ;
        }

        if(isset($request->footer_text )) {
            $footer_text = $request->footer_text ;
        } else {
            $footer_text = $settings->footer_text ;
        }

        if(isset($request->twitter )) {
            $twitter = $request->twitter ;
        } else {
            $twitter = $settings->twitter ;
        }

        if(isset($request->facebook )) {
            $facebook = $request->facebook ;
        } else {
            $facebook = $settings->facebook ;
        }

        if(isset($request->linkedin )) {
            $linkedin = $request->linkedin ;
        } else {
            $linkedin = $settings->linkedin ;
        }

        if(isset($request->instagram )) {
            $instagram = $request->instagram ;
        } else {
            $instagram = $settings->instagram ;
        }

        if(isset($request->youtube )) {
            $youtube = $request->youtube ;
        } else {
            $youtube = $settings->youtube ;
        }

        if(isset($request->email_1 )) {
            $email_1 = $request->email_1 ;
        } else {
            $email_1 = $settings->email_1 ;
        }

        if(isset($request->email_2 )) {
            $email_2 = $request->email_2 ;
        } else {
            $email_2 = $settings->email_2 ;
        }

        if(isset($request->tel_1 )) {
            $tel_1 = $request->tel_1 ;
        } else {
            $tel_1 = $settings->tel_1 ;
        }

        if(isset($request->tel_2 )) {
            $tel_2 = $request->tel_2 ;
        } else {
            $tel_2 = $settings->tel_2 ;
        }

        if(isset($request->adress )) {
            $adress = $request->adress ;
        } else {
            $adress = $settings->adress ;
        }

        /* if(isset($request->adress_iframe )) {
              $adress_iframe	 = $request->adress_iframe	 ;
          } else {
              $adress_iframe	 = $settings->adress_iframe	 ;
          }
  */
        if(isset($request->favicon )) {
            $favicon = $request->favicon ;
        } else {
            $favicon = $settings->favicon ;
        }

        if(isset($request->icon )) {
            $icon = $request->icon ;
        } else {
            $icon = $settings->icon ;
        }


        DB::table('settings')->where('id', '1')->update([
            'site_name' => $site_name,
            'site_description' => $site_description,
            'robots' => $robots,
            'analytics' => $analytics,
            'meta_tag' => $meta_tag,
            'footer_text' => $footer_text,
            'twitter' => $twitter,
            'facebook' => $facebook,
            'linkedin' => $linkedin,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'email_1' => $email_1,
            'email_2' => $email_2,
            'tel_1' => $tel_1,
            'tel_2' => $tel_2,
            'adress' => $adress,
            // 'adress_iframe	' => $adress_iframe	,
            'favicon' => $favicon,
            'icon' => $icon,
        ]);
        return back()->with('success', 'Site bilgileri başarıyla güncellendi.');
    }

    public function  uyekayit()
    {
        return view('backend.uyekayit');
    }

    public function uyekayit_post(Request $request)
    {
        if(isset($request->avatar)) {
            $info = getimagesize($request->avatar);
            $extension = image_type_to_extension($info[2]);
            $imageName = time().$extension;
            $request->avatar->move(public_path('img/avatars'), $imageName);
        } else {
            $imageName = '';
        }
        $user= new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->last_name = $request->last_name;
        $user->telefon = $request->telefon;
        $user->izin = $request->izin;
        $user->avaar = "avatars/".$imageName;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect('admin/uye-listesi')->with('success', $request->name.' isimli üye başarıyla oluşturuldu.');
    }

    public function uyelistesi()
    {
        $users=User::all();
        return view('backend.uyelistesi')->with('users',$users);
    }

    public function uye_duzenle($ne)
    {
        return view('backend.uye-duzenle')->with('id', $ne);
    }

    public function uye_duzenle_post(Request $request)
    {
        if(isset($request->avatar)) {
            $info = getimagesize($request->avatar);
            $extension = image_type_to_extension($info[2]);
            $imageName = time() . $extension;
            $request->avatar->move(public_path('img/avatars'), $imageName);
            DB::table('users')->where('id', $request->id)->update([
                'avatar' => "avatars/".$imageName,
            ]);
            return redirect('admin/uye-listesi')->with('success', 'Üye avatarı başarıyla düzenlendi');
        }
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
            'telefon' => $request->input('telefon'),
            'izin' => $request->input('izin'),
        ]);
        if($request->password != '') {
            DB::table('users')->where('id', $request->id)->update([
                'password' => bcrypt(request()->password),
            ]);
        }
        return redirect('admin/uye-listesi')->with('success', 'Üye başarıyla düzenlendi.');
    }

    public function kategoriler()
    {
      return view('backend.kategoriler');
    }

    public function kategori_ekle()
    {
        return view('backend.kategori-ekle');
    }

    public function kategori_ekle_post(Request $request)
    {
        if(isset($request->image)) {
            $info = getimagesize($request->image);
            $extension = image_type_to_extension($info[2]);
            $imageName = time().$extension;
            $request->avatar->move(public_path('img'), $imageName);
        } else {
            $imageName = '';
        }
        DB::table('kategoriler')->insert([
            'title' => $request->title,
            'title_2' => $request->title_2,
            'image' => $imageName,
            'genel' => $request->genel,
        ]);
        return redirect('admin/kategoriler')->with('success', 'Kategori ekleme işlemi başarılı');
    }

    public function kategori_duzenle($ne)
    {
        return view('backend.kategori-duzenle')->with('id', $ne);
    }

    public function kategori_duzenle_post(Request $request)
    {
        if(isset($request->image)) {
            $info = getimagesize($request->image);
            $extension = image_type_to_extension($info[2]);
            $imageName = time() . $extension;
            $request->image->move(public_path('img'), $imageName);
            DB::table('kategoriler')->where('id', $request->id)->update([
                'image' => $imageName,
            ]);
        }
        DB::table('kategoriler')->where('id', $request->id)->update([
            'title' => $request->title,
            'title_2' => $request->title_2,
            'genel' => $request->genel,
        ]);
        return redirect('admin/kategoriler')->with('success', 'Kategori düzenleme işlemi başarılı');
    }

}
