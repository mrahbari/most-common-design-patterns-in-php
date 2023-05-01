<?php
include_once "./PaymentInterface.php";

class Payment implements PaymentInterface {
    public function pay($amount) {
        // Logic to process payment goes here
        echo "Payment processed for amount $" . $amount . "\n";
    }
}