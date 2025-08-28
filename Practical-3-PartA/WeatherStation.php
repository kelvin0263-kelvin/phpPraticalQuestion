<?php
//Name: Tan Chun Keat
//Student ID : 2314612
require_once 'WeatherData.php';
require_once 'CurrentConditions.php';
require_once 'WeatherStatistics.php';
require_once 'PressureObserver.php';
?>

<html>
    <body>
        <h3>Weather Station</h3>
        <?php

            $w = new WeatherData(29.7,70.0, 25.1);
            echo "Initial Weather Reading<br/>";
            echo "Temperature: ". $w->getTemperature() . "&#8451; <br/>";
            echo "Humidity: ". $w->getHumidity() . "% <br/>";
            echo "Pressure: ". $w->getPressure() . "lbs <br/>";

            $c = new CurrentConditions($w);
            $w->attach($c);

            $s = new WeatherStatistics($w);
            $w->attach($s);

            $p = new PressureObserver($w);
            $w->attach($p);

            $w->setTemperature(30.5);
            $w->setTemperature(28.8);
            $w->setTemperature(35.3);

            $w->setPressure(25.1);
            $w->setPressure(20.5);
            $w->setPressure(30.1);


        ?>
    </body>
</html>