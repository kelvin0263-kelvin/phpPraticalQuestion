<?php
//Name: Tan Chun Keat
//Student ID : 2314612
require_once('EmailAbstractDecorator.php');

class SecureEmailDecorator extends EmailAbstractDecorator
{
    public function getContent()
    {
        return $this->encryption();
    }

    private function encryption()
    {
        $content = $this->email->getContent();
        return strrev($content); // Simple obfuscation (not real encryption)
    }
}
?>