<?php
include_once "./PaymentInterface.php";
include_once "./PaymentDecorator.php";

class PaymentRetryDecorator extends PaymentDecorator {
    private int $retryCount;

    public function __construct(PaymentInterface $payment, int $retryCount) {
        parent::__construct($payment);
        $this->retryCount = $retryCount;
    }

    /**
     * @throws Exception
     */
    public function pay($amount) {
        $tries = 0;
        while ($tries < $this->retryCount) {
            try {
                $this->payment->pay($amount);
                echo "Payment processed successfully\n";
                return;
            } catch (Exception $e) {
                $tries++;
                echo "Payment failed, retrying...\n";
            }
        }
        throw new Exception("Payment failed after " . $this->retryCount . " retries");
    }
}