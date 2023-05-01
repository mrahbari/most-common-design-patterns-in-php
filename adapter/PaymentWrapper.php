<?php
require_once 'PaymentInterface.php';

// Define the Wrapper that wraps around the PaymentInterface
class PaymentWrapper {
    private PaymentInterface $payment;

    public function __construct(PaymentInterface $payment) {
        $this->payment = $payment;
    }

    public function doPayment($amount) {
        $this->payment->pay($amount);
    }
}
