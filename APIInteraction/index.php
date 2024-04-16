<?php

$api_url = "https://api.weatherapi.com/v1/current.json?key=fcf6e1cedd974a5295e200113241404&q=Yerevan";

$response = file_get_contents($api_url);

if ($response !== false) {
    $data = json_decode($response, true);

    $temperature = $data['current']['temp_c'];
    $condition = $data['current']['condition']['text'];
    $humidity = $data['current']['humidity'];
    $wind_speed = $data['current']['wind_kph'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Weather Information</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="weather-info">
        <h2>Weather in Yerevan</h2>
        <p><strong>Temperature:</strong> <?= $temperature; ?>C</p>
        <p><strong>Condition:</strong> <?= $condition; ?></p>
        <p><strong>Humidity:</strong> <?= $humidity; ?>%</p>
        <p><strong>Wind Speed:</strong> <?= $wind_speed; ?> km/h</p>
    </div>
    </body>
    </html>
    <?php
} else {
    echo 'Failed to fetch weather data. Please try again later.';
}
?>
