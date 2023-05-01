<?php
include_once "./PaymentInterface.php";

abstract class PaymentDecorator implements PaymentInterface {
    protected PaymentInterface $payment;

    public function __construct(PaymentInterface $payment) {
        $this->payment = $payment;
    }

    public function pay($amount) {
        $this->payment->pay($amount);
    }
}
