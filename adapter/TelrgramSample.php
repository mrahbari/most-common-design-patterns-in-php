<?php
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
