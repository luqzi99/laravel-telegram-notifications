<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramNotiController extends Controller
{
    public function trigger(){
        $i = 10/0;
    }

    // public function index(){
    //     try {
    //         // Simulate an error
    //         $undefinedVariable = $nonExistentArray['key'];
    //     } catch (\Exception $e) {
    //         // Get app name, IP address, time, and user information

    //         $message = "Error Notification\n";
    //         $message .= "App Name: " . config('app.name') . "\n";
    //         $message .= "IP Address: " . request()->ip() . "\n";
    //         $message .= "Time: " . now() . "\n";
    //         $message .= "User: " . 'Guest' . "\n";
    //         $message .= "Error Message:\n" . $e->getMessage();

    //         // Send the notification with error details
    //         $this->sendTelegramMessage($message);
    //     }
    // }

    // private function sendTelegramMessage($message)
    // {
    //     Telegram::bot('mybot')->sendMessage([
    //         'chat_id' => env('TELEGRAM_CHAT_ID'),
    //         'text' => $message,
    //     ]);
    // }
}
