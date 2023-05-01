<?php

class PaymentProcessor {
    private PaymentGateway $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }

    public function process(float $amount) {
        // Business logic for processing payment
        $this->paymentGateway->processPayment($amount);
        // Additional code for logging or sending notification emails, etc.
    }
}