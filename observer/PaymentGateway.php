<?php
include_once "./PaymentSubject.php";

// Concrete subject
class PaymentGateway implements PaymentSubject {
    private $observers = array();
    private $amount;
    private $currency;
    private $status;

    public function setAmount($amount, $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->status = 'pending';
        $this->notify();
    }

    public function setStatus($status) {
        $this->status = $status;
        $this->notify();
    }

    public function attach(PaymentObserver $observer) {
        $this->observers[] = $observer;
    }

    public function detach(PaymentObserver $observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function getStatus() {
        return $this->status;
    }
}