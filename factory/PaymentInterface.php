<?php
interface PaymentInterface {
    public function charge($amount);
}