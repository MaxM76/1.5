<?php
$link = 'http://api.openweathermap.org/data/2.5/weather';
$cityId = '524901';
$appId = '5339eb2c19539b482dacee95c4b20479';
$request = $link . '?id=' . $cityId . '&APPID=' . $appId;

$weatherJson = file_get_contents ($request);
if ($weatherJson === false) {
    exit('Не удалось получить данные');
}

$curWeather = json_decode ($weatherJson, true);
if ($curWeather === null) {
    exit('Ошибка декодирования');
}

$iconURI = 'http://openweathermap.org/img/w/' . $curWeather["weather"][0]["icon"] . '.png';
$weatherIconTag = '<img src="' . $iconURI . '" alt="">';
$weatherCharacter = (!empty($curWeather["weather"][0]["main"])) ? $curWeather["weather"][0]["main"] : 'не удалось получить данные';
$weatherDiscr = (!empty($curWeather["weather"][0]["description"])) ? $curWeather["weather"][0]["description"] : 'не удалось получить данные';
$weatherTemp = (!empty($curWeather["main"]["temp"])) ? $curWeather["main"]["temp"] - 273.15 : 'нет данных';
$weatherPressure = (!empty($curWeather["main"]["pressure"])) ? round($curWeather["main"]["pressure"] / 1.333, 1) : 'нет данных';
$weatherHumidity = (!empty($curWeather["main"]["humidity"])) ? $curWeather["main"]["humidity"] : 'нет данных';
$weatherMinTemp = (!empty($curWeather["main"]["temp_min"])) ? $curWeather["main"]["temp_min"] - 273.15 : 'нет данных';
$weatherMaxTemp = (!empty($curWeather["main"]["temp_max"])) ? $curWeather["main"]["temp_max"] - 273.15 : 'нет данных';
?>

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
    echo "<h2>Погода в Москве$weatherIconTag</h2>";
    echo "<p>Общий характер погоды: $weatherCharacter</p>";
    echo "<p>Описание погоды: $weatherDiscr</p>";
    echo "<p>Температура: $weatherTemp градусов Цельсия</p>";
    echo "<p>Атмосферное давление: $weatherPressure мм рт.ст.</p>";
    echo "<p>Влажность: $weatherHumidity%</p>";
    echo "<p>Минимальная температура: $weatherMinTemp градусов Цельсия</p>";
    echo "<p>Максимальная температура: $weatherMaxTemp градусов Цельсия</p>";
?>

  </body>
</html>

