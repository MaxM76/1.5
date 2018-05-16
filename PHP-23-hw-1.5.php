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
    <h2>Погода в Москве</h2>

<?php
    $city_id = "?id=524901";
    $appid = "&APPID=5339eb2c19539b482dacee95c4b20479";
    $request = "http://api.openweathermap.org/data/2.5/weather" . $city_id . $appid;

    $weather_json = file_get_contents ($request);

    $cur_weather = json_decode ($weather_json, true);

    echo "<p>Group of weather parameters (Rain, Snow, Extreme etc.): " . $cur_weather["weather"][0]["main"] . "</p>";
    echo "<p>Weather condition within the group: " . $cur_weather["weather"][0]["description"] . "</p>";

    echo "<p>Temperature: " . $cur_weather["main"]["temp"] . "</p>";
    echo "<p>Atmospheric pressure (on the sea level, if there is no sea_level or grnd_level data), hPa: " . $cur_weather["main"]["pressure"] . "</p>";
    echo "<p>Humidity, %: " . $cur_weather["main"]["humidity"] . "</p>";
    echo "<p>Minimum temperature at the moment: " . $cur_weather["main"]["temp_min"] . "</p>";
    echo "<p>Maximum temperature at the moment: " . $cur_weather["main"]["temp_max"] . "</p>";
?>

  </body>
</html>

