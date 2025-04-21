<?php
$weatherData = null;
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = htmlspecialchars(trim($_POST["city"]));
    $apiKey = "your_api_key_here"; // Replace with your actual OpenWeatherMap API key
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

    $response = @file_get_contents($apiUrl);
    if ($response !== FALSE) {
        $weatherData = json_decode($response, true);
        if ($weatherData['cod'] != 200) {
            $error = "City not found. Please enter a valid city.";
            $weatherData = null;
        }
    } else {
        $error = "Error fetching weather data. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
    <style>
        body { font-family: Arial; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 500px; background: white; padding: 20px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .error { color: red; }
        .result { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check Weather</h2>
        <form method="POST" action="">
            <input type="text" name="city" placeholder="Enter city name" required>
            <button type="submit">Get Weather</button>
        </form>

        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php elseif ($weatherData): ?>
            <div class="result">
                <h3>Weather in <?= htmlspecialchars($weatherData['name']) ?></h3>
                <p>Temperature: <?= $weatherData['main']['temp'] ?> °C</p>
                <p>Humidity: <?= $weatherData['main']['humidity'] ?>%</p>
                <p>Condition: <?= ucfirst($weatherData['weather'][0]['description']) ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
