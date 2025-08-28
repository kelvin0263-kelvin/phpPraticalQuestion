<?php
//Name: Tan Chun Keat
//Student ID : 2314612
interface PayPal
{
    public function getCreditCardNo();
    public function getCustomerName();
    public function getCardExpMonth();
    public function getCardExpYear();
    public function getCardCVVNo();
    public function getAmount();

    public function setCreditCardNo($creditCardNo);
    public function setCustomerName($customerName);
    public function setCardExpMonth($cardExpMonth);
    public function setCardExpYear($cardExpYear);
    public function setCardCVVNo($cardCVVNo);
    public function setAmount($amount);
}
