
<?php
//Name: Tan Chun Keat
//Student ID : 2314612

require_once 'Observer.php';
require_once 'WeatherData.php';
require_once 'Subject.php';

class CurrentConditions implements Observer{

    private $temp;
    private $humidity;

    public function __construct(WeatherData $w)
    {
        $this->temp = $w->getTemperature();
        $this->humidity = $w->getHumidity();
    }

    public function update(Subject $subject){
        $this->temp = $subject->getTemperature();
        $this->humidity = $subject->getHumidity();
        $this->display();
    }

    public function display(){
        $str ="<p><h3>Current Conditions</h3>";
        $str .= "<br/>Temperature: " . $this->temp . "&#8451; c";
        $str .= "<br/>Humidity: " . $this->humidity . "% </p>";
        echo $str;
    }

}



?>