<?php
require_once 'PayPal.php';
require_once 'StripeImplementation.php';

class ClassAdapterStripeToPayPal extends StripeImplementation implements PayPal
{

    public function getCreditCardNo()
    {
        return $this->getCustCardNo();
    }

    public function getCustomerName()
    {
        return $this->getCardOwnerName();
    }

    public function getCardExpMonth()
    {
        return substr($this->getCardExpMonthDate(), 0, 2);
    }

    public function getCardExpYear()
    {
        return substr($this->getCardExpMonthDate(), 3, 2);
    }

    public function getCardCVVNo()
    {
        return $this->getCVVNo();
    }

    public function getAmount()
    {
        return $this->getTotalAmount();
    }

    public function setCreditCardNo($creditCardNo)
    {
        $this->setCustCardNo($creditCardNo);
    }

    public function setCustomerName($customerName)
    {
        $this->setCardOwnerName($customerName);
    }

    public function setCardExpMonth($cardExpMonth)
    {
        $year = $this->getCardExpYear() ?: "00";
        $this->setCardExpMonthDate("$cardExpMonth/$year");
    }

    public function setCardExpYear($cardExpYear)
    {
        $month = $this->getCardExpMonth() ?: "00";
        $this->setCardExpMonthDate("$month/$cardExpYear");
    }

    public function setCardCVVNo($cardCVVNo)
    {
        $this->setCVVNo($cardCVVNo);
    }

    public function setAmount($amount)
    {
        $this->setTotalAmount($amount);
    }
}
