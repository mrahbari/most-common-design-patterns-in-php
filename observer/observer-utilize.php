<?php
/**
 * The PaymentGateway class is the subject that notifies its observers whenever a payment is made.
 * The PaymentLogger and PaymentEmail classes are the concrete observers that respond to the notification in their own way.
 * To use this code, you can create a new instance of PaymentGateway and attach one or more observers to it using the attach method.
 * You can then call the setAmount method to make a payment and the observers will be notified.
 * You can also detach observers using the detach method.
 */
include_once "./PaymentGateway.php";
include_once "./PaymentLogger.php";
include_once "./PaymentEmail.php";

// Usage
$paymentGateway = new PaymentGateway();

$paymentLogger = new PaymentLogger();
$paymentGateway->attach($paymentLogger);

$paymentEmail = new PaymentEmail();
$paymentGateway->attach($paymentEmail);

$paymentGateway->setAmount(1000, 'USD');

$paymentGateway->setStatus('approved');

$paymentGateway->detach($paymentEmail);

$paymentGateway->setAmount(500, 'EUR');
