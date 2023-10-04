<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Telegram\Bot\Laravel\Facades\Telegram;


class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            if ($e instanceof \Exception) {
                $message = $e->getMessage();
                // $this->sendTelegramMessage($message);
                // $this->sendTelegramMessage($message);

            }

        });
    }

    public function report(Throwable $exception)
    {
        // Check if this exception should be reported
        if ($this->shouldReport($exception)) {
            // $controllerName = debug_backtrace()[0]['args'];
            // $controllerName = $controllerName[0];
            // dd(debug_backtrace(),$controllerName,gettype($controllerName));

            // Create a message with error details
            $message = "Error Notification\n";
            $message .= "App Name: " . config('app.name') . "\n";
            $message .= "IP Address: " . request()->ip() . "\n";
            $message .= "Time: " . now() . "\n";
            $message .= "User: " . 'Guest' . "\n\n";
            // $message .= "Controller: " . $controllerName . "\n"; // Include the controller's name
            $message .= "Error in File:\n" . $exception->getFile() . "\n";
            $message .= "Line Number: " . $exception->getLine(); // Get the line number here
            $message .= "Error Message:\n" . $exception->getMessage()."\n";

            // Send the notification with error details to Telegram
            $this->sendTelegramMessage($message);

        }

        parent::report($exception);
    }

    private function sendTelegramMessage($message)
    {
        Telegram::bot('mybot')->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => $message,
        ]);
    }

}
