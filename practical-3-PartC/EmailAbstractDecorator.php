<?php
//Name: Tan Chun Keat
//Student ID : 2314612
    require_once('IEmail.php');
abstract class EmailAbstractDecorator implements IEmail 
{
    protected $email;

    public function __construct(IEmail $email)
    {
        $this->email = $email;
    }

    public abstract function getContent();
}
