<?php
include_once "./PaymentSubject.php";

// Observer interface
interface PaymentObserver {
    public function update(PaymentSubject $subject);
}