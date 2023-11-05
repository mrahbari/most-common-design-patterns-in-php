<?php
interface PaymentInterface {
    public function charge(float $amount);
}
