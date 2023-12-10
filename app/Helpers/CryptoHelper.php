<?php

namespace App\Helpers;

use App\Helpers\Clients\CoinGeckoClient;
use App\Models\Crypto;
use App\Models\History;

class CryptoHelper
{
    public function tickHistory(){
        $client = new CoinGeckoClient();
        $cryptos = Crypto::where('is_activated', true)->get();
        $ids = $cryptos->pluck('identifier')->toArray();
        $ids = implode(',', $ids);
        $histories = $client->coinMarkets('usd', $ids, 1, 100);

        foreach ($histories as $history){
            $dbCrypto = Crypto::where('identifier', $history['id'])->first();
            $dbHistory = History::create(
                [
                    'interval' => 'm1',
                    'crypto_id' => $dbCrypto->id,
                    'current_price' => $history['current_price'],
                    'high_24h' => $history['high_24h'],
                    'low_24h' => $history['low_24h'],
                    'price_change_24h' => $history['price_change_24h'],
                    'price_change_percentage_24h' => $history['price_change_percentage_24h'],
                    'price_change_percentage_1h_in_currency' => $history['price_change_percentage_1h_in_currency'],
                    'price_change_percentage_24h_in_currency' => $history['price_change_percentage_24h_in_currency'],
                    'price_change_percentage_7d_in_currency' => $history['price_change_percentage_7d_in_currency'],
                    'last_updated' => $history['last_updated'],
                ]
            );

            $dbCrypto->update([
                'last_record' => json_encode([
                    'interval' => $dbHistory->interval,
                    'crypto_id' => $dbCrypto->id,
                    'current_price' => $dbHistory->current_price,
                    'high_24h' => $dbHistory->high_24h,
                    'low_24h' => $dbHistory->low_24h,
                    'price_change_24h' => $dbHistory->price_change_24h,
                    'price_change_percentage_24h' => $dbHistory->price_change_percentage_24h,
                    'price_change_percentage_1h_in_currency' => $dbHistory->price_change_percentage_1h_in_currency,
                    'price_change_percentage_24h_in_currency' => $dbHistory->price_change_percentage_24h_in_currency,
                    'price_change_percentage_7d_in_currency' => $dbHistory->price_change_percentage_7d_in_currency,
                    'last_updated' => $dbHistory->last_updated,
                ])
            ]);
        }
    }

    public function historyM5(){
        $cryptos = Crypto::where('is_activated', true)->get();

        foreach ($cryptos as $crypto){
            $object = json_decode($crypto->last_record);
            $dbHistory = History::create(
                [
                    'interval' => 'm30',
                    'crypto_id' => $crypto->id,
                    'current_price' => $object->current_price,
                    'high_24h' => $object->high_24h,
                    'low_24h' => $object->low_24h,
                    'price_change_24h' => $object->price_change_24h,
                    'price_change_percentage_24h' => $object->price_change_percentage_24h,
                    'price_change_percentage_1h_in_currency' => $object->price_change_percentage_1h_in_currency,
                    'price_change_percentage_24h_in_currency' => $object->price_change_percentage_24h_in_currency,
                    'price_change_percentage_7d_in_currency' => $object->price_change_percentage_7d_in_currency,
                    'last_updated' => $object->last_updated,
                ]
            );
        }
    }

    public function historyM30(){
        $cryptos = Crypto::where('is_activated', true)->get();

        foreach ($cryptos as $crypto){
            $object = json_decode($crypto->last_record);
            $dbHistory = History::create(
                [
                    'interval' => 'm30',
                    'crypto_id' => $crypto->id,
                    'current_price' => $object->current_price,
                    'high_24h' => $object->high_24h,
                    'low_24h' => $object->low_24h,
                    'price_change_24h' => $object->price_change_24h,
                    'price_change_percentage_24h' => $object->price_change_percentage_24h,
                    'price_change_percentage_1h_in_currency' => $object->price_change_percentage_1h_in_currency,
                    'price_change_percentage_24h_in_currency' => $object->price_change_percentage_24h_in_currency,
                    'price_change_percentage_7d_in_currency' => $object->price_change_percentage_7d_in_currency,
                    'last_updated' => $object->last_updated,
                ]
            );
        }
    }

    public function historyH1(){
        $cryptos = Crypto::where('is_activated', true)->get();

        foreach ($cryptos as $crypto){
            $object = json_decode($crypto->last_record);
            $dbHistory = History::create(
                [
                    'interval' => 'h1',
                    'crypto_id' => $crypto->id,
                    'current_price' => $object->current_price,
                    'high_24h' => $object->high_24h,
                    'low_24h' => $object->low_24h,
                    'price_change_24h' => $object->price_change_24h,
                    'price_change_percentage_24h' => $object->price_change_percentage_24h,
                    'price_change_percentage_1h_in_currency' => $object->price_change_percentage_1h_in_currency,
                    'price_change_percentage_24h_in_currency' => $object->price_change_percentage_24h_in_currency,
                    'price_change_percentage_7d_in_currency' => $object->price_change_percentage_7d_in_currency,
                    'last_updated' => $object->last_updated,
                ]
            );
        }
    }

    public function historyH4(){
        $cryptos = Crypto::where('is_activated', true)->get();

        foreach ($cryptos as $crypto){
            $object = json_decode($crypto->last_record);
            $dbHistory = History::create(
                [
                    'interval' => 'h4',
                    'crypto_id' => $crypto->id,
                    'current_price' => $object->current_price,
                    'high_24h' => $object->high_24h,
                    'low_24h' => $object->low_24h,
                    'price_change_24h' => $object->price_change_24h,
                    'price_change_percentage_24h' => $object->price_change_percentage_24h,
                    'price_change_percentage_1h_in_currency' => $object->price_change_percentage_1h_in_currency,
                    'price_change_percentage_24h_in_currency' => $object->price_change_percentage_24h_in_currency,
                    'price_change_percentage_7d_in_currency' => $object->price_change_percentage_7d_in_currency,
                    'last_updated' => $object->last_updated,
                ]
            );
        }
    }

    public function historyD1(){
        $cryptos = Crypto::where('is_activated', true)->get();

        foreach ($cryptos as $crypto){
            $object = json_decode($crypto->last_record);
            $dbHistory = History::create(
                [
                    'interval' => 'd1',
                    'crypto_id' => $crypto->id,
                    'current_price' => $object->current_price,
                    'high_24h' => $object->high_24h,
                    'low_24h' => $object->low_24h,
                    'price_change_24h' => $object->price_change_24h,
                    'price_change_percentage_24h' => $object->price_change_percentage_24h,
                    'price_change_percentage_1h_in_currency' => $object->price_change_percentage_1h_in_currency,
                    'price_change_percentage_24h_in_currency' => $object->price_change_percentage_24h_in_currency,
                    'price_change_percentage_7d_in_currency' => $object->price_change_percentage_7d_in_currency,
                    'last_updated' => $object->last_updated,
                ]
            );
        }
    }

}
