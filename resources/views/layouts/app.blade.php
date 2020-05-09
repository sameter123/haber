<!doctype html>
<html lang="tr">
<?php
$settings = DB::table('settings')->first();
?>
<head>
    <meta charset="utf-8">
    <title>{{$settings->site_name}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="{{$settings->description}}" name="description">
    <meta name="robots" content="@if($settings->robots == '1')index follow @else noindex nofollow @endif">
    <meta name="googlebot" content="@if($settings->robots == '1')index follow @else noindex nofollow @endif">
    <link rel="icon" href="public/img/{{$settings->favicon}}">
    <link href="public/img/{{$settings->favicon}}" rel="apple-touch-icon">
    {{$settings->meta}}
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$settings->analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{$settings->analytics}}');
    </script>
    <?php
    date_default_timezone_set('Europe/Istanbul');
    class Detect
    {
        public static function systemInfo()
        {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $os_platform    = "Bilinmeyen İşletim sistemi";
            $os_array       = array(
                '/windows nt 10/i'      =>  'Windows 10',
                '/windows nt 6.3/i'     =>  'Windows 8.1',
                '/windows phone 8/i'    =>  'Windows Phone 8',
                '/windows phone os 7/i' =>  'Windows Phone 7',
                '/windows nt 6.2/i'     =>  'Windows 8',
                '/windows nt 6.1/i'     =>  'Windows 7',
                '/windows nt 6.0/i'     =>  'Windows Vista',
                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                '/windows nt 5.1/i'     =>  'Windows XP',
                '/windows xp/i'         =>  'Windows XP',
                '/windows nt 5.0/i'     =>  'Windows 2000',
                '/windows me/i'         =>  'Windows ME',
                '/win98/i'              =>  'Windows 98',
                '/win95/i'              =>  'Windows 95',
                '/win16/i'              =>  'Windows 3.11',
                '/macintosh|mac os x/i' =>  'Mac OS X',
                '/mac_powerpc/i'        =>  'Mac OS 9',
                '/linux/i'              =>  'Linux',
                '/ubuntu/i'             =>  'Ubuntu',
                '/iphone/i'             =>  'iPhone',
                '/ipod/i'               =>  'iPod',
                '/ipad/i'               =>  'iPad',
                '/android/i'            =>  'Android',
                '/blackberry/i'         =>  'BlackBerry',
                '/webos/i'              =>  'Mobile');
            $found = false;
            $device = '';
            foreach ($os_array as $regex => $value)
            {
                if($found)
                    break;
                else if (preg_match($regex, $user_agent))
                {
                    $os_platform    =   $value;
                    $device = !preg_match('/(windows|mac|linux|ubuntu)/i',$os_platform)
                        ?'MOBILE':(preg_match('/phone/i', $os_platform)?'MOBILE':'SYSTEM');
                }
            }
            $device = !$device? 'SYSTEM':$device;
            return array('os'=>$os_platform,'device'=>$device);
        }

        public static function browser()
        {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $browser        =   "Bilinmeyen tarayıcı";

            $browser_array  = array('/msie/i'       =>  'Internet Explorer',
                '/firefox/i'    =>  'Firefox',
                '/safari/i'     =>  'Safari',
                '/chrome/i'     =>  'Chrome',
                '/opera/i'      =>  'Opera',
                '/netscape/i'   =>  'Netscape',
                '/maxthon/i'    =>  'Maxthon',
                '/konqueror/i'  =>  'Konqueror',
                '/mobile/i'     =>  'Handheld Browser');
            $found = false;
            foreach ($browser_array as $regex => $value)
            {
                if($found)
                    break;
                else if (preg_match($regex, $user_agent,$result))
                {
                    $browser    =   $value;
                }
            }
            return $browser;
        }
    }
    $system = Detect::systemInfo();
    $browser = Detect::browser();
    $ip = Request::ip();
    $page = Request::path();
    if($page == '/') {
        $page = 'anasayfa';
    }
    $kontrol = DB::table('istatistik')->where('ip', $ip)->whereDay('date', date('d'))->count();
    if($kontrol > 0) {
        DB::table('istatistik')->insert([
            'ip' => $ip,
            'date' => date('YmdHis'),
            'page' => $page,
            'device' => $system['os'],
            'browser' => $browser,
            'ms' => $system['device'],
            'tekil' => 0
        ]);
    } else {
        DB::table('istatistik')->insert([
            'ip' => $ip,
            'date' => date('YmdHis'),
            'page' => $page,
            'device' => $system['os'],
            'browser' => $browser,
            'ms' => $system['device'],
            'tekil' => 1
        ]);
    }
    ?>
@yield('content')
