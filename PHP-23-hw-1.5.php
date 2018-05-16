<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Домашнее задание к лекции 1.5 «Стандартные функции»</title>
  </head>

  <body>
    <h1>Домашнее задание к лекции 1.5 «Стандартные функции»</h1>


<?php
    $city_id = "?id=524901";
    $appid = "&APPID=5339eb2c19539b482dacee95c4b20479";
    $request = "http://api.openweathermap.org/data/2.5/weather" . $city_id . $appid;

    $weather_json = file_get_contents ($request);

    $cur_weather = json_decode ($weather_json, true);
    $icon_uri = "http://openweathermap.org/img/w/" . $cur_weather["weather"][0]["icon"] . ".png";

    echo "<h2>Погода в Москве" .  "<img src=\"" . $icon_uri . "\" alt=\"\"></h2>";
    echo "<p>Общий характер погоды: " . $cur_weather["weather"][0]["main"] . "</p>";
    echo "<p>Описание погоды: " . $cur_weather["weather"][0]["description"] . "</p>";
    echo "<p>Температура: " .  ($cur_weather["main"]["temp"] - 273.15) . " градусов Цельсия</p>";
    echo "<p>Атмосферное давление: " . round($cur_weather["main"]["pressure"] / 1.333, 1) . " мм рт.ст.</p>";
    echo "<p>Влажность: " . $cur_weather["main"]["humidity"] . "%</p>";
    echo "<p>Минимальная температура: " . ($cur_weather["main"]["temp_min"] - 273.15) . " градусов Цельсия</p>";
    echo "<p>Максимальная температура: " . ($cur_weather["main"]["temp_max"] - 273.15) . " градусов Цельсия</p>";
?>

  </body>
</html>

