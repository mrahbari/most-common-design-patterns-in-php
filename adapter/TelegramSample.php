<?php
/**
The PHP code demonstrates the Adapter design pattern to facilitate communication between an existing `Telegram` class 
and a system requiring a generic `MessageSender` interface. The `TelegramAdapter` class acts as a bridge, allowing 
the `Telegram` class to seamlessly integrate with components expecting the `MessageSender` interface. 

This promotes flexibility and code reusability by adapting the methods of the `Telegram` class to align with the expected 
interface, enabling consistent usage across the system. The example usage at the end showcases how the adapter is employed 
to send a message using the adapted `Telegram` class.
**/

// Existing class that needs to be adapted
class Telegram {

    public function __construct() {
        // Your Code here
    }

    public function sendMessage($message) {
        // Send message
    }
}

// Define the target interface
interface MessageSender {
    public function send($message);
}

// Adapter class implementing the target interface
class TelegramAdapter implements MessageSender {

    private $telegram;

    public function __construct(Telegram $telegram) {
        $this->telegram = $telegram;
    }

    public function send($message) {
        $this->telegram->sendMessage($message);
    }
}

// Example usage

// Create an instance of the existing class (Adaptee)
$telegram = new Telegram();

// Create an instance of the adapter, passing the existing class instance
$telegramAdapter = new TelegramAdapter($telegram);

// Use the adapter to send a message, adhering to the target interface
$messageToSend = "Hello, this is a message!";
$telegramAdapter->send($messageToSend);
