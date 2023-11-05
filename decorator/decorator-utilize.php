<?php
/**
 * In this example, we have a Payment class that implements the PaymentInterface, just like in the previous example.
 * We then have two decorators: KlarnaDecorator and PayPalDecorator.
 *
 * The KlarnaDecorator takes in the credit card number, expiration date, and cvv as constructor parameters.
 * In the pay method, it first validates the credit card by calling the validateCreditCard method, and then calls the pay method of the decorated payment object. Finally, it echoes a message to indicate that the payment was processed with the credit card number.

 * The PayPalDecorator takes in the email and password for the PayPal account as constructor parameters. In the pay method, it first logs in to the PayPal account by calling the loginToPayPal method, and then calls the pay method of the decorated payment object. Finally, it echoes a message to indicate that the payment was processed with the PayPal account.

 * In the example usage section, we create a Payment object and decorate it first with the KlarnaDecorator and then with the PayPalDecorator. We then call the `
 *
 *
 * In this example, we first create a new Payment object. We then decorate it with a KlarnaDecorator and a PayPalDecorator to allow payments to be processed using a credit card and a PayPal account. We also decorate it with a PaymentLoggerDecorator to log all payment transactions and a PaymentRetryDecorator to automatically retry failed payments up to three times.
 * Finally, we call the pay() method on the decorated Payment object to process a payment of $100. If an exception is thrown during payment processing, we catch it and display an error message.
 *
 * In decorator pattern
 * 1- An interface is required to define the methods that each class should implement. (PaymentMethod.php)
 * 2- A factory class is needed to invoke and manage the implemented classes. (PaymentMethodFactory.php)
 * 3- Business-related classes are needed to handle specific tasks, and they should implement the defined interfaces. (Paypal.php, Klarna.php)
 * 4- To utilize the factory class, a file such as a controller should be created with specific parameters. (factory-utilize.php)
 */
// Require the classes
require_once 'PaymentInterface.php';
require_once 'Payment.php';
require_once 'PaymentDecorator.php';
require_once 'KlarnaDecorator.php';
require_once 'PayPalDecorator.php';
require_once 'PaymentLoggerDecorator.php';
require_once 'PaymentRetryDecorator.php';

// Set up the logger
class Logger {
    public function log($message) {
        echo $message . "\n";
    }
}
$logger = new Logger();

// Create a new Payment object
$payment = new Payment();

// Decorate the Payment object with a KlarnaDecorator
$payment = new KlarnaDecorator($payment, "1234 5678 9012 3456", "04/25", "123");
$payment->pay(2000);

// Decorate the Payment object with a PayPalDecorator
$payment = new PayPalDecorator($payment, "example@example.com", "password");
$payment->pay(1000);

// Decorate the Payment object with a PaymentLoggerDecorator
$payment = new PaymentLoggerDecorator($payment, $logger);
$payment->pay(3000);

// Decorate the Payment object with a PaymentRetryDecorator
$payment = new PaymentRetryDecorator($payment, 3);
try {
    $payment->pay(4000);
} catch (Exception $e) {
    echo "Error processing payment: " . $e->getMessage() . "\n";
}
