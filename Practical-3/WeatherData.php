<?php
require_once 'Subject.php';

class WeatherData extends Subject{
    private $temperature;
    private $humidity;
    private $pressure;

    public function __construct($temperature,$humidity,$pressure)
    {
        parent::__construct();
        $this->temperature =$temperature;
        $this->humidity =$humidity;
        $this->pressure =$pressure;

    }

    public function getTemperature(){
        return $this->temperature;
    }

    public function setTemperature($temperature): void{
        $this->temperature = $temperature;
        $this->notify();
    }

    public function getHumidity(){
        return $this->humidity;
    }

    public function setHumidity($humidity): void{
        $this->humidity = $humidity;
        $this->notify();
    }


    public function getPressure(){
        return $this->pressure;
    }

    public function setPressure($pressure): void{
        $this->pressure = $pressure;
        $this->notify();
    }

    public function __toString()
    {
        return 
        "Temperature: " . $this->temperature . 
        ", Humidity: " . $this->humidity .
        ", Pressure: " . $this->pressure;
    }

}


?>