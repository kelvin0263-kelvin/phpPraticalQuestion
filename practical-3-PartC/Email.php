<?php
//Name: Tan Chun Keat
//Student ID : 2314612
    require_once('IEmail.php');
class Email implements IEmail
{
    private $to;
    private $from;
    private $message;
    // constructors
    public function __construct($to, $from, $message)
    {
        $this->to = $to;
        $this->from = $from;
        $this->message = $message;
    }

    public function getContent()
    {
        return $this->message;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getFrom()
    {
        return $this->from;
    }
    public function setFrom($from)
    {
        $this->from = $from;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }



    // getters
}
