<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
    
        // Handle predefined messages and user input
        $botman->hears('{message}', function($botman, $message) {
            if (stripos($message, 'hi') !== false) {
                $this->simulateTyping($botman); // Simulate typing before sending the response
                $this->sendPredefinedMessages($botman);
            } 
            elseif (stripos($message, 'office hours') !== false) {
                $this->simulateTyping($botman); // Simulate typing
                $botman->reply('Our office hours are from 9 AM to 5 PM, Monday to Friday.');
                $this->sendPredefinedMessages($botman);
            } 
            else {
                // Fallback response for unrecognized messages
                $this->simulateTyping($botman); // Simulate typing
                $this->fallbackResponse($botman);
            }
        });
    
        // Handle button responses
        $botman->hears('message_1', function($botman) {
            $this->simulateTyping($botman); // Simulate typing
            $botman->reply('Hello! How can I help you?');
            $this->sendPredefinedMessages($botman); 
        });
    
        $botman->hears('message_2', function($botman) {
            $this->simulateTyping($botman); // Simulate typing
            $botman->reply('What are the office hours?');
    
            // Simulate typing before the follow-up message
            $this->simulateTyping($botman); 
            $botman->reply('Our office hours are from 9 AM to 5 PM, Monday to Friday.');
    
            // Show predefined messages again
            $this->sendPredefinedMessages($botman);
        });
    
        $botman->hears('message_3', function($botman) {
            $this->simulateTyping($botman); // Simulate typing
            $botman->reply('Can I request a document online?');
    
            // Simulate typing before the detailed response
            $this->simulateTyping($botman);
            $botman->reply('Yes, you can request documents online through our website. Here are the steps:<br>' .
                '**Step 1:** Register on our website.<br>' .
                '**Step 2:** Log in to your account.<br>' .
                '**Step 3:** Verify your account by submitting a valid ID or a certificate of residency. Please wait for your account to be verified and ensure that your contact number is up-to-date.<br>' .
                '**Step 4:** Navigate to the "Request" tab.<br>' .
                '**Step 5:** Select the document you need and fill out the necessary details.<br>' .
                '**Step 6:** You will receive updates about your request via SMS.');
    
            $this->sendPredefinedMessages($botman);
        });
    
        // Start listening for messages
        $botman->listen();
    }
    
    // Function to simulate typing/loading effect
    public function simulateTyping($botman)
    {
        // Simulate typing for a short period (e.g., 1.5 seconds)
        $botman->typesAndWaits(1.5); 
    }
    
    // Function to send predefined message buttons
    public function sendPredefinedMessages($botman)
    {
        // Create a question with buttons for predefined options
        $question = Question::create("Hey there! Feel free to pick a topic, and I'll be happy to help!")
            ->addButtons([
                Button::create('What are the office hours?')->value('message_2'),
                Button::create('Can I request a document online?')->value('message_3'),
            ]);
    
        // Reply with the question and buttons
        $botman->reply($question);
    }
    
    // Fallback response for unrecognized messages
    public function fallbackResponse($botman)
    {
        $botman->reply("I'm sorry, I didn't quite understand that. Could you please rephrase or ask something else?");
        $this->sendPredefinedMessages($botman);
    }    
    

}
