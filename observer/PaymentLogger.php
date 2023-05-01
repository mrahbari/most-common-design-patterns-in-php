<?php
include_once "./PaymentObserver.php";
include_once "./PaymentSubject.php";

// Concrete observer
class PaymentLogger implements PaymentObserver {
    public function update(PaymentSubject $subject) {
        $amount = $subject->getAmount();
        $currency = $subject->getCurrency();
        $status = $subject->getStatus();
        echo "Payment of $amount $currency logged. Status: $status" . PHP_EOL;
    }
}