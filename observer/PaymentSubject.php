<?php

include_once "./PaymentObserver.php";

// Subject interface
interface PaymentSubject {
    public function attach(PaymentObserver $observer);
    public function detach(PaymentObserver $observer);
    public function notify();
}