<?php
/**
 * This code follows best practices for the Strategy design pattern by using interfaces to define the behavior of the payment gateway classes and by encapsulating the payment processing logic in a separate class that is independent of the specific payment gateway implementation.
 * We then define a PaymentProcessor class that takes a PaymentGateway object as a dependency in its constructor. This class contains the business logic for processing a payment, which includes calling the processPayment() method on the provided gateway object.
 * By doing this, we are able to decouple the payment processing logic from the specific payment gateway implementation. This makes the code more modular and easier to maintain, as we can easily swap out the payment gateway object without having to modify the PaymentProcessor class.
 *
 * In strategy pattern
 * 1- An interface is required to define the methods that each class should implement. (PaymentGateway.php)
 * 2- A Processor class is needed to take the interface (PaymentGateway) object as a dependency in its constructor.Common logs such as notifications, logs, etc  should be implemented to it's method(process). (PaymentProcessor.php)
 * 3- Business-related classes are needed to handle specific tasks, and they should implement the defined interfaces. (Paypal.php, Stripe.php)
 * 4- To utilize the strategy class, a file such as a controller should be created with specific parameters. (strategy-utilize.php)
 */
include_once "./Paypal.php";
include_once "./Stripe.php";
include_once "./PaymentProcessor.php";

// Example usage
$paypalGateway = new PayPal();
$processor = new PaymentProcessor($paypalGateway);
$processor->process(100.0);

$stripeGateway = new Stripe();
$processor = new PaymentProcessor($stripeGateway);
$processor->process(50.0);
