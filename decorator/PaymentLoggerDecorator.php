<?php
include_once "./PaymentInterface.php";
include_once "./PaymentDecorator.php";

class PaymentLoggerDecorator extends PaymentDecorator {
    private Logger $logger;

    public function __construct(PaymentInterface $payment, Logger $logger) {
        parent::__construct($payment);
        $this->logger = $logger;
    }

    public function pay($amount) {
        $this->payment->pay($amount);
        $this->logPayment($amount);
    }

    private function logPayment($amount) {
        $this->logger->log("Payment processed for amount $" . $amount);
    }
}