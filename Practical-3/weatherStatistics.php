<?php
require_once 'Observer.php';
require_once 'WeatherData.php';
require_once 'Subject.php';


class WeatherStatistics implements Observer{
    private $averageTemp;
    private $minTemp;
    private $maxTemp;

    public function __construct(WeatherData $w)
    {
        $this->averageTemp = $w->getTemperature();
        $this->minTemp = PHP_FLOAT_MIN;
        $this->maxTemp = PHP_FLOAT_MAX;
    }

    public function update(Subject $subject){
        $currentTemp = $subject->getTemperature();
        if($currentTemp < $this->minTemp){
            $this->minTemp=$currentTemp;
        }
        if($currentTemp > $this->maxTemp){
             $this->maxTemp=$currentTemp;
        }
        $this->averageTemp=($this->minTemp + $this->maxTemp) / 2;
        $this->display();
    }


    public function display(){
        $str ="<p><h3>Weather Statistics</h3>";
        $str .="<br/> Minimum Temperature: " . $this->minTemp . "&#8451; ";
        $str .="<br/> Maximum Temperature: " . $this->maxTemp . "&#8451; ";
        $str .="<br/> Average Temperature: " 
        . number_format($this->averageTemp,2) . "&#8451; ";
    }


}

?>