<?php
include_once "./PaymentObserver.php";
include_once "./PaymentSubject.php";

// Concrete observer
class PaymentEmail implements PaymentObserver {
    public function update(PaymentSubject $subject) {
        $amount = $subject->getAmount();
        $currency = $subject->getCurrency();
        $status = $subject->getStatus();
        echo "Payment email sent for amount of $amount $currency. Status: $status" . PHP_EOL;
    }
}