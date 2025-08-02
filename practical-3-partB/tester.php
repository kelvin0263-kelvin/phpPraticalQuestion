<?php
require_once('StripeImplementation.php');
require_once('ObjectAdapterStripeToPayPal.php');

$stripe = new StripeImplementation();
$adapter = new ObjectAdapterStripeToPayPal($stripe);

$adapter->setAmount(100);
$adapter->setCardCVVNo(123);
$adapter->setCardExpMonth(9);
$adapter->setCardExpYear(2029);
$adapter->setCreditCardNo(1234567890);
$adapter->setCustomerName("Kelvin");


echo "CustomerName = ".$adapter->getCustomerName()."<br>";
echo "CreditCardNo = ".$adapter->getCreditCardNo()."<br>";
echo "CardCVV = ".$adapter->getCardCVVNo()."<br>";
echo "CardExpMonth = ".$adapter->getCardExpMonth().$adapter->getCardExpYear()."<br>";
echo "CardAmount = ".$adapter->getAmount()."<br>";








?>