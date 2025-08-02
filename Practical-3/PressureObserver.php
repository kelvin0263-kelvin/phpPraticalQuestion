<?php
require_once 'Observer.php';
require_once 'WeatherData.php';
require_once 'Subject.php';

class PressureObserver implements Observer{
    private $currentPressure;
    private $previousPressure;

    public function __construct(WeatherData $w)
    {
        $this->currentPressure = $this->previousPressure = $w->getPressure();
    }

    public function update (Subject $subject){
        $this->previousPressure = $this->currentPressure;
        $this->currentPressure = $subject->getPressure();
        $this->display();
    }

    public function display(){
           $str ="<p><h3>Simple Forecast</h3>";
           if($this->currentPressure > $this->previousPressure){
            $str .= "Improving weather on the way!";
           }
           elseif ($this->currentPressure == $this->previousPressure){
            $str .="More of the same";
           }
           else {
            $str .= "Watch out for cooler, rainy weather";
           }
           $str .="</p>";
           echo $str;
    }
}

?>