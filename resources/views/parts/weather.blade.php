<?php
$getir = "https://api.openweathermap.org/data/2.5/onecall?lat=40.7888531&lon=30.3884444&exclude=current,minutely,hourly&appid=4274f92d3edfaadfe581b1218493a4f4&units=metric&lang=tr";
$veriler = json_decode(file_get_contents($getir));
$coz = $veriler;
setlocale(LC_TIME, "turkish"); //başka bir dil içinse burada belirteceksin.
setlocale(LC_ALL,'turkish'); //başka bir dil içinse burada belirteceksin.
?>
<!-- START WEATHER -->
<div class="weather-wrapper">
    <div class="row thm-margin">
        <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3 weather-week thm-padding">
            <div class="list-group">
                @for($i = 0; $i < 4; $i++)
                    <?php
                    $gelen = $coz->daily[$i];
                    $tarih = gmdate("Y-m-d H:i:s", $gelen->dt);
                    ?>
                <a href="#" class="list-group-item @if($i == 0) active @endif">
                    <i class="flaticon-cloudy"></i>
                    <div>{{iconv('latin5','utf-8',strftime('%a',strtotime($tarih)))}},{{substr($gelen->temp->max, 0, 2)}}°C</div>
                </a>
                @endfor
            </div>
        </div>
        <div class="col-xs-9 col-sm-8 col-md-9 col-lg-9 bhoechie-tab thm-padding">
        @for($i = 0; $i < 4; $i++)
            <?php
            $gelen = $coz->daily[$i];
            $tarih = gmdate("Y-m-d H:i:s", $gelen->dt);
            ?>
            <!-- weather temperature -->
            <div class="weather-temp-wrap @if($i == 0) active @endif">
                <div class="city-day">
                    <div class="city">Sakarya</div>
                    <div class="day">
                        <?php
                        echo iconv('latin5','utf-8',strftime(' %d %B %Y %A',strtotime($tarih)));
                        ?>
                    </div>
                </div>
                <div class="weather-icon">
                    <i><img src="http://openweathermap.org/img/wn/{{$gelen->weather[0]->icon}}@2x.png"></i>
                    <div class="main-temp">
                        {{substr($gelen->temp->max, 0, 2)}}°C</div>
                </div>
                <div class="break">
                    <div class="wind-condition"> Rüzgar: {{$gelen->wind_speed}}/Saat</div>
                    <div class="humidity">Nem: {{$gelen->humidity}}%</div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
<!-- END OF /. WEATHER -->
