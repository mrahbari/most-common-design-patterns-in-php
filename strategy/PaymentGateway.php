<?php
interface PaymentGateway {
    public function processPayment(float $amount);
}