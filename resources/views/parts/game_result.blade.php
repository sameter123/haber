<?php
function file_get_contents_utf8($fn) {
    $content = file_get_contents($fn);
    return mb_convert_encoding($content, 'UTF-8',
        mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}
$getir = "https://www.tff.org/Default.aspx?pageID=976&grupID=1765#grp";
$veriler = file_get_contents_utf8($getir);
for ($i=1; $i < 19; $i++) {
    if($i < 10) {
        $i = "0".$i;
    }
    $takim = preg_match_all('@<a id="ctl00_MPane_m_976_9896_ctnr_m_976_9896_grvACetvel_ctl'.$i.'_lnkTakim" href="(.*?)">(.*?)</a>@', $veriler, $takimlar[]);
}
for ($i=1; $i < 19; $i++) {
    if($i < 10) {
        $i = "0".$i;
    }
    $takim = preg_match_all('@<span id="ctl00_MPane_m_976_9896_ctnr_m_976_9896_grvACetvel_ctl'.$i.'_Label4">(.*?)</span>@', $veriler, $galibiyetler[]);
}
for ($i=1; $i < 19; $i++) {
    if($i < 10) {
        $i = "0".$i;
    }
    $takim = preg_match_all('@<span id="ctl00_MPane_m_976_9896_ctnr_m_976_9896_grvACetvel_ctl'.$i.'_lblKazanma">(.*?)</span>@', $veriler, $beraberlikler[]);
}
for ($i=1; $i < 19; $i++) {
    if($i < 10) {
        $i = "0".$i;
    }
    $takim = preg_match_all('@<span id="ctl00_MPane_m_976_9896_ctnr_m_976_9896_grvACetvel_ctl'.$i.'_lblPuan">(.*?)</span>@', $veriler, $maglubiyetler[]);
}
for ($i=1; $i < 19; $i++) {
    if($i < 10) {
        $i = "0".$i;
    }
    $takim = preg_match_all('@<span id="ctl00_MPane_m_976_9896_ctnr_m_976_9896_grvACetvel_ctl'.$i.'_Label3">(.*?)</span>@', $veriler, $puanlar[]);
}
?>

<!-- START GAMES RESULT POST -->
<div class="panel_inner games-news">
    <div class="panel_header">
        <h4><strong>Güncel Puan Tablosu</strong></h4>
    </div>
    <div class="table-responsive">
        <table class="table text-center">
            <thead>
            <tr>
                <th>Skor Tablosu</th>
                <th>G</th>
                <th>B</th>
                <th>M</th>
                <th><strong>P</strong></th>
            </tr>
            </thead>
            <tbody>
            @for($i=0; $i < 18; $i++)
                <?php
                $gelenTakimAdi = $takimlar[$i][2][0];
                $title_result = "Türkiye'nin en iyi oranlari ile Lider Bahis Sitesi";
                $turkish = array("Ý", "Ð", "ü", "Þ", "ö", "ç");//turkish letters
                $english   = array("i", "Ğ", "u", "Ş", "o", "c");//english cooridinators letters
                $gelenTakimAdi = str_replace($turkish, $english, $gelenTakimAdi);//replace php function
                $galibiyet = $galibiyetler[$i][1][0];
                $beraberlik = $beraberlikler[$i][1][0];
                $maglubiyet = $maglubiyetler[$i][1][0];
                $puan = $puanlar[$i][1][0];
                ?>
                @if(strstr($gelenTakimAdi, 'SAKARYASPOR' ))
                    <tr style="background-color: rgb(0 149 68 / 18%);">
                @else
                    <tr>
                @endif
                <th>@if(strstr($gelenTakimAdi, 'SAKARYASPOR' ))<strong>@endif{{$gelenTakimAdi}}@if(strstr($gelenTakimAdi, 'SAKARYASPOR' ))</strong>@endif</th>
                <td>{{$galibiyet}}</td>
                <td>{{$beraberlik}}</td>
                <td>{{$maglubiyet}}</td>
                <td><b>{{$puan}}</b></td>
            </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
<!-- END OF /. GAMES RESULT POST -->
