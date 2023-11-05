<?php

include_once "./PaymentInterface.php";

class Klarna implements PaymentInterface
{
    private string $cardNumber;
    private string $expirationDate;
    private string $cvv;

    public function __construct(string $cardNumber, string $expirationDate, string $cvv)
    {
        $this->cardNumber = $cardNumber;
        $this->expirationDate = $expirationDate;
        $this->cvv = $cvv;
    }

    public function charge(float $amount)
    {
        printf(" \n\r ");
        printf(" \n\r Here you go : The credit card");
        printf(" \n\r You sent us %s-%s-%s information to calculate your charges.", $this->cardNumber, $this->expirationDate, $this->cvv);
        printf(" \n\r The credit card charge is calculated and you must pay %s: ", ($amount * 15) / 100);
        printf(" \n\r ");
    }
}
