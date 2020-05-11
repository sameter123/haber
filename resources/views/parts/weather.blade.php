<?php
$veriler = "http://api.openweathermap.org/data/2.5/forecast?id=740352&appid=4274f92d3edfaadfe581b1218493a4f4&lang=tr&units=metric";
$homepage = file_get_contents($veriler);
$coz = json_decode($homepage);
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
                    $a = $i * 8;
                    $gelen = $coz->list[$a];
                    $tarih = gmdate("Y-m-d H:i:s", $gelen->dt);
                    ?>
                <a href="#" class="list-group-item @if($i == 0) active @endif">
                    <i class="flaticon-cloudy"></i>
                    <div>{{iconv('latin5','utf-8',strftime(' %a ',strtotime($tarih)))}}, {{substr($gelen->main->temp, 0, 2)}}°C</div>
                </a>
                @endfor
            </div>
        </div>
        <div class="col-xs-9 col-sm-8 col-md-9 col-lg-9 bhoechie-tab thm-padding">
            <!-- weather temperature -->
            <div class="weather-temp-wrap active">
                <div class="city-day">
                    <div class="city">Sakarya</div>
                    <div class="day">
                        <?php
                        echo iconv('latin5','utf-8',strftime(' %d %B %Y %A %H:%M ',strtotime(date('Y-m-d H:i'))));
                        ?>
                    </div>
                </div>
                <div class="weather-icon">
                    <i class="flaticon-cloudy"></i>
                    <div class="main-temp">
                        {{substr($coz->list[0]->main->temp, 0, 2)}}°C</div>
                </div>
                <div class="break">
                    <div class="wind-condition"> Rüzgar: {{$coz->list[0]->wind->speed}}/Saat</div>
                    <div class="humidity">Nem: {{$coz->list[0]->main->humidity}}%</div>
                </div>
            </div>
            <!-- weather temperature -->
            <div class="weather-temp-wrap">
                <div class="city-day">
                    <div class="city">Sakarya</div>
                    <div class="day">
                    </div>
                </div>
                <div class="weather-icon">
                    <i class="flaticon-sun"></i>
                    <div class="main-temp">38°F</div>
                </div>
                <div class="break">
                    <div class="wind-condition"> Wind: 11mph WSW</div>
                    <div class="humidity">Humidity: 89%</div>
                </div>
            </div>
            <!-- weather temperature -->
            <div class="weather-temp-wrap">
                <div class="city-day">
                    <div class="city">Dhaka</div>
                    <div class="day">Wednesday, 8.00pm</div>
                </div>
                <div class="weather-icon">
                    <i class="flaticon-cloud"></i>
                    <div class="main-temp">32°F</div>
                </div>
                <div class="break">
                    <div class="wind-condition"> Wind: 11mph WSW</div>
                    <div class="humidity">Humidity: 89%</div>
                </div>
            </div>
            <!-- weather temperature -->
            <div class="weather-temp-wrap">
                <div class="city-day">
                    <div class="city">Dhaka</div>
                    <div class="day">Friday, 8.00pm</div>
                </div>
                <div class="weather-icon">
                    <i class="flaticon-rain"></i>
                    <div class="main-temp">31°F</div>
                </div>
                <div class="break">
                    <div class="wind-condition"> Wind: 16mph WSW</div>
                    <div class="humidity">Humidity: 93%</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF /. WEATHER -->
