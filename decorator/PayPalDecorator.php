<?php
include_once "./PaymentInterface.php";
include_once "./PaymentDecorator.php";

class PayPalDecorator extends PaymentDecorator {
    private string $email;
    private string $password;

    public function __construct(PaymentInterface $payment, string $email, string $password) {
        parent::__construct($payment);
        $this->email = $email;
        $this->password = $password;
    }

    public function pay($amount) {
        $this->loginToPayPal();
        $this->payment->pay($amount);
        echo "Payment processed with PayPal account " . $this->email . "\n";
        echo "Payment processed with PayPal password " . $this->password . "\n";
    }

    private function loginToPayPal() {
        // Logic to log in to PayPal with email and password goes here
        echo "Logged in to PayPal successfully\n";
    }
}