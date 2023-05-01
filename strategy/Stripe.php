<?php
include_once "./PaymentGateway.php";

class Stripe implements PaymentGateway {
    public function processPayment(float $amount) {
        printf(" \n\r ");
        printf(" \n\r Hello Stripe");
        printf(" \n\r You sent %sAmount.", $amount);
        printf(" \n\r The Stripe charge is calculated and you must pay %s: ", ($amount * 15) / 100);
        printf(" \n\r ");
    }
}