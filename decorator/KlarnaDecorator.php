<?php
include_once "./PaymentInterface.php";
include_once "./PaymentDecorator.php";

class KlarnaDecorator extends PaymentDecorator {
    private string $creditCardNumber;
    private string $expirationDate;
    private string $cvv;

    public function __construct(PaymentInterface $payment, string $creditCardNumber, string $expirationDate, string $cvv) {
        parent::__construct($payment);
        $this->creditCardNumber = $creditCardNumber;
        $this->expirationDate = $expirationDate;
        $this->cvv = $cvv;
    }

    public function pay($amount) {
        $this->validateCreditCard();
        $this->payment->pay($amount);
        echo "Payment processed with credit card number " . $this->creditCardNumber . "\n";
        echo "Payment processed with credit card expirationDate " . $this->expirationDate . "\n";
        echo "Payment processed with credit card cvv " . $this->cvv . "\n";
    }

    private function validateCreditCard() {
        // Logic to validate credit card number, expiration date, and cvv goes here
        echo "Credit card validated successfully\n";
    }
}
