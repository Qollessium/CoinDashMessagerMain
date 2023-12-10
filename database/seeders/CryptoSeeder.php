<?php

namespace Database\Seeders;

use App\Helpers\Clients\CoinGeckoClient;
use App\Models\Crypto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CryptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new CoinGeckoClient();
        $response = $client->coinList();
        $randomCoins = array_rand($response, 3);

        foreach ($randomCoins as $randomCoin){
            $coin = $response[$randomCoin];
            Crypto::create([
                'name' => $coin['name'],
                'symbol' => $coin['symbol'],
                'identifier' => $coin['id'],
                'is_activated' => true,
                'last_record' => null
            ]);
        }
    }
}
