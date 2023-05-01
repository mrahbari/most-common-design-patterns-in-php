<?php
/**
 * By using a factory, we can easily add new payment methods without having to modify the code that uses them. This makes our code more flexible and easier to maintain.
 * We also have a PaymentFactory class that takes a type and a set of parameters and returns an instance of the corresponding payment method. This allows us to create payment methods without knowing the details of their implementation.
 *
 * In factory pattern
 * 1- An interface is required to define the methods that each class should implement. (PaymentInterface.php)
 * 2- A factory class is needed to invoke and manage the implemented classes. (PaymentFactory.php)
 * 3- Business-related classes are needed to handle specific tasks, and they should implement the defined interfaces. (Paypal.php, CreditCard.php)
 * 4- To utilize the factory class, a file such as a controller should be created with specific parameters. (factory-utilize.php)
 */
include "./PaymentFactory.php";

// Usage example
try {
    $creditCard = PaymentFactory::create('credit-card', ['cardNumber' => '1234 5678 9012 3456', 'expirationDate' => '01/23', 'cvv' => '123']);
    $creditCard->charge(12555100);
} catch (Exception $e) {
}

try {
    $payPal = PaymentFactory::create('paypal', ['email' => 'example@paypal.com', 'password' => 'password']);
    $payPal->charge(1666854);
} catch (Exception $e) {
}
