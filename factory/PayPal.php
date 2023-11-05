<?php
include_once "./PaymentInterface.php";

class PayPal implements PaymentInterface
{
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function charge(float $amount)
    {
        printf(" \n\r ");
        printf(" \n\r Here you go : The paypal");
        printf(" \n\r You sent us %s-%s information to calculate your charges.", $this->email, $this->password);
        printf(" \n\r The paypal charge is calculated and you must pay %s: ", ($amount * 15) / 100);
        printf(" \n\r ");
    }
}
