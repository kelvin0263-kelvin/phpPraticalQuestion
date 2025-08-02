<?php
require_once 'Observer.php';

abstract class Subject
{
    private $observers;

    public function __construct()
    {
        $this->observers = array();
    }

    public function attach(Observer $observer)
    {
        array_push($this->observers, $observer);
    }

    public function detach(Observer $observer){
        $index = 0;
        foreach ($this->observers as $o){
            if ($o == $observer ){
                $index++;
            }
        }
    }

    public function notify(){
        foreach ($this->observers as $o){
            $o->update($this);
        }
    }


}


?>