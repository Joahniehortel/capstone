<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    public function index()
    {
        return view("admin.message");
    }

    public function sendSms(Request $request)
    {   
        $apiKey =  '13f7b618f98605a8ee2e9fb86198fbb1';
        $ch = curl_init();
        $parameters = array(
            'apikey' =>$apiKey,
            'number' => $request->input('mobile_number'),
            'message' => $request->input('sms_message'),
            'sendername' => 'Thesis'
        );
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        return back();
    }

    public function getAccountInfo(){
        $response = Http::get('https://api.semaphore.co/api/v4/messages', [
            'apikey' => '13f7b618f98605a8ee2e9fb86198fbb1'
        ]);
        if ($response->successful()) {
            $messages = $response->json(); 
        
            return view('admin.messageLogs')->with('messages', $messages);
        } else {
            return 'error';
        }
    }
    public function getAccountInfoTable(){
        $messages = session('messages');

        return view('admin.messageLogs', compact('messages'));
    }

}
