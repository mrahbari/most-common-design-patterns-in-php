<?php
include_once "./PaymentGateway.php";

class PayPal implements PaymentGateway {
    public function processPayment(float $amount) {
        printf(" \n\r ");
        printf(" \n\r Hello Paypal");
        printf(" \n\r You sent %sAmount.", $amount);
        printf(" \n\r The paypal charge is calculated and you must pay %s: ", ($amount * 15) / 100);
        printf(" \n\r ");
    }
}