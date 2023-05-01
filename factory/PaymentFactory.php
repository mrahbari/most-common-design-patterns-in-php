<?php
include_once "./CreditCard.php";
include_once "./PayPal.php";

class PaymentFactory {
    /**
     * @throws Exception
     */
    public static function create($type, $params) {
        switch($type) {
            case 'credit-card':
                return new CreditCard($params['cardNumber'], $params['expirationDate'], $params['cvv']);
            case 'paypal':
                return new PayPal($params['email'], $params['password']);
            default:
                throw new Exception('Invalid payment method type');
        }
    }
}