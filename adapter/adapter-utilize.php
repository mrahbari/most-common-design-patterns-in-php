<?php
/**
 * In this example, we have a Paypal class that implements the PaymentInterface.
 * We then Define the Adapter that adapts the PayPal class to our PaymentInterface.
 * It means the method name (pay) must be the same as PaymentInterface, however the body of the method is PayPal.php method (sendPayment)

 * In addition, with PaymentWrapper we can wrap the method. I mean If in the future the name of the pay method is changed in the PaymentInterface,
 * we will only change it in the wrapper (PaymentWrapper::doPayment)

 * In adapter pattern
 * 1- An interface is required to define the methods that each class should implement. (PaymentInterface.php)
 * 2- Business-related classes are needed to handle specific tasks, and they should implement the defined interfaces. (Paypal.php)
 * 3- An adapter is needed(PayPalAdapter) to "implement interface(PaymentInterface)" and replace the body of interface method with injected payment class
 * 4- Also with PaymentWrapper we can wrap the method "inject the interface in constructor". I mean If in the future the name of the pay method is changed in the PaymentInterface,
 * 5- To utilize the adapter and wrapper class, a file such as a controller should be created with specific parameters. (adapter-utilize.php)
 */
// Require the classes
require_once 'PaymentInterface.php';
require_once 'PayPal.php';
require_once 'PayPalAdapter.php';
require_once 'PaymentWrapper.php';

// Process the payment
try {
    $paypal = new PayPal();
    $paypalAdapter = new PayPalAdapter($paypal);
    $paypalAdapter->pay(100);

    //OR
    //More advanced usage with wrapper
    $wrapper = new PaymentWrapper($paypalAdapter);
    $wrapper->doPayment(100);
} catch (Exception $e) {
    echo "Error processing payment: " . $e->getMessage() . "\n";
}
