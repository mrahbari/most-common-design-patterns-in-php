<?php
// Define the PaymentInterface that our existing payment classes implement
interface PaymentInterface {
    public function pay($amount);
}