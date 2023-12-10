<?php

namespace App\Helpers;

use App\Models\Crypto;
use App\Models\History;
use Twilio\TwiML\Voice\Sms;

class Analyze
{

    public function analyzeM5(){
        $result = [];
        $cryptos = Crypto::where('is_activated', true)->get();

        foreach ($cryptos as $crypto){
            $histories = History::where('interval', 'm1')->where('crypto_id', $crypto->id)->orderBy('created_at', 'desc')->limit(2)->get();

            if (count($histories) >= 2) {
                $currentPriceChangePercentage = ($histories[0]->current_price - $histories[1]->current_price) / $histories[1]->current_price * 100;

                if ($currentPriceChangePercentage > 30) {
                    $result[] = $crypto->name;
                }
            }
        }

        if(count($result) > 0){
            $SMSHelper = new SMSHelper();
            $messageBody = 'We thought Crypto Currencies specified below are worth to check. They have been performing well for last 5 minutes.' . "\n\n";
            $messageBody .= implode(", ", $result);
            $SMSHelper->sendSMS("+905366170299", $messageBody);
        }

        return $result;
    }

    public function analyzeM30(){
        $result = [];
        $cryptos = Crypto::where('is_activated', true)->get();

        foreach ($cryptos as $crypto){
            $histories = History::where('interval', 'm30')->where('crypto_id', $crypto->id)->orderBy('created_at', 'desc')->limit(2)->get();

            if (count($histories) >= 2) {
                $currentPriceChangePercentage = ($histories[0]->current_price - $histories[1]->current_price) / $histories[1]->current_price * 100;

                if ($currentPriceChangePercentage > 30) {
                    $result[] = $crypto->slug;
                }
            }
        }

        return $result;
    }
}
