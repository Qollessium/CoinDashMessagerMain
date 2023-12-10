<?php

namespace App\Helpers;

use Twilio\Rest\Client;

class SMSHelper
{
    public function sendSMS($receiver, $message){
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $sender = getenv("TWILIO_PHONE");
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create($receiver, // to
                [
                    "body" => $message,
                    "from" => $sender
                ]
            );
        print($message->sid);
    }
}
