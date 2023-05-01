<?php

require_once 'PaymentInterface.php';
require_once 'PayPal.php';

// Define the Adapter that adapts the PayPal class to our PaymentInterface
class PayPalAdapter implements PaymentInterface {
    private PayPal $paypal;

    public function __construct(PayPal $paypal) {
        $this->paypal = $paypal;
    }

    public function pay($amount) {
        $this->paypal->sendPayment($amount);
    }
}