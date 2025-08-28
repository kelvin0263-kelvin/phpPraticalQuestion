<?php
//Name: Tan Chun Keat
//Student ID : 2314612
    require_once('EmailAbstractDecorator.php');
 class DisclaimerEmailDecorator extends EmailAbstractDecorator{

    private $disclaimer = "  <br >Discalaimer meassage";

    public function getContent(){
        return $this->email->getContent().$this->disclaimer;
    }

 }










?>