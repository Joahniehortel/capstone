<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Support\Facades\Auth;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        // Specific keyword matches
        $botman->hears('hi', function ($botman) {
            $this->simulateTyping($botman);
            $this->sendPredefinedMessages($botman);
        });

        $botman->hears('office hours', function ($botman) {
            $this->simulateTyping($botman);
            $botman->reply('Our office hours are from 9 AM to 5 PM, Monday to Friday.');
            $this->sendPredefinedMessages($botman);
        });

        $botman->hears('file a complaint|complaints|complaint|how to file a complaint|how to file complaint', function ($botman) {
            $this->simulateTyping($botman);
            // Handle complaint logic here
            $botman->reply(
                'You can file a complaint by visiting our website or directly through the barangay hall.<br><br>
                
                <strong>Create an Account:</strong> Ensure you have an eBarangay account. If you don’t have one, register on the website.<br><br>
                
                <strong>Verify Mobile Number:</strong> Log in to your account and ensure your mobile number is registered and verified.<br><br>
                
                <strong>Navigate to Complaints Tab:</strong><br>
                From the homepage, locate and click on the "Complaints" tab.<br><br>
                
                <strong>Fill Out the Complaint Form:</strong><br>
                Complete the form with the necessary details about your complaint.<br><br>
                
                <strong>Submit the Form:</strong><br>
                Once you have filled out the form, click the "Submit" button.<br><br>
                
                <strong>Wait for Updates:</strong><br>
                After submission, wait for updates regarding your complaint status.<br><br>
                
                <strong>Check Complaint Status:</strong><br>
                To view the status of your complaint, click on your profile icon.<br>
                Navigate to the "My Complaints" tab.<br><br>
                
                <strong>Manage Your Complaints:</strong><br>
                Here, you can view the status, update your complaint details, or delete it if necessary.'
            );
            
            $this->sendPredefinedMessages($botman);
            
        });

        // Add other predefined message handlers
        $botman->hears('request document|how to request document', function ($botman) {
            $this->simulateTyping($botman);
            $botman->reply(
                'Yes, you can request documents online through our website.<br><br>
                
                <strong>Create an Account:</strong> If you don’t have an eBarangay account, you will need to register on our website first.<br>
                Fill in the required information and verify your email address to activate your account.<br><br>
                
                <strong>Verify Your Account:</strong><br>
                After creating your account, log in and navigate to your profile.<br>
                Click on the "Unverified" status to initiate the verification process.<br>
                You will need to submit a photo of a valid ID or any document that verifies you are a resident of the barangay.<br><br>
                
                After submitting the necessary documents, please wait for updates regarding your verification status.<br><br>
                
                Once your account is verified, you can easily request documents to the website'
            );
            $this->sendPredefinedMessages($botman);
        });

        $botman->hears('where is the barangay hall|barangay hall', function ($botman) {
            $this->simulateTyping($botman);
            $botman->reply('The barangay hall is located at Father Selga Street, Poblacion District, Davao City...');
            $this->sendPredefinedMessages($botman);
        });
        $botman->hears('Who is the barangay captain', function ($botman) {
            $this->simulateTyping($botman);
            $botman->reply('The current barangay captain is Hon. James J. Abadilla.');
            $this->sendPredefinedMessages($botman);
        });
        $botman->hears('who is the captain|barangay captain', function ($botman) {
            $this->simulateTyping($botman);
            $botman->reply('The current barangay captain is Hon. James J. Abadilla.');
            $this->sendPredefinedMessages($botman);
        });
        // Fallback for unrecognized inputs
        $botman->fallback(function ($botman) {
            $this->simulateTyping($botman);
            $this->fallbackResponse($botman);
        });

        // Start listening
        $botman->listen();
    }

    // Simulate typing/loading effect
    public function simulateTyping($botman)
    {
        $botman->typesAndWaits(1.5);
    }
    public function sendFollowUpButtons($botman)
{
    $question = Question::create("How would you like to proceed?")
        ->addButtons([
            Button::create('How to request a document?')->value('how to request document'),
        ]);

    $botman->reply($question);
}

    // Predefined message buttons
    public function sendPredefinedMessages($botman)
    {
        $question = Question::create("Hey there! Feel free to pick a topic, and I'll be happy to help!")
            ->addButtons([
                Button::create('What are the office hours?')->value('office hours'),
                Button::create('Can I request a document online?')->value('request document'),
                Button::create('How can I file a complaint?')->value('file a complaint'),
                Button::create('Who is the barangay captain?')->value('barangay captain'),
                Button::create('Where is the barangay hall located?')->value('where is the barangay hall'),
            ]);


        $botman->reply($question);
    }

    // Fallback response
    public function fallbackResponse($botman)
    {
        $botman->reply("I'm sorry, I didn't quite understand that. Could you please rephrase or ask something else?");
        $this->sendPredefinedMessages($botman);
    }

}
