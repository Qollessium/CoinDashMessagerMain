<?php

namespace App\Console\Commands;

use App\Helpers\Analyze;
use App\Helpers\Clients\CoinGeckoClient;
use App\Helpers\SMSHelper;
use App\Models\Crypto;
use App\Models\History;
use Illuminate\Console\Command;

class MainCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:main-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $helper = new SMSHelper();
        $helper->sendSMS("+905444524027", 'test');
        return;
        $analyze = new Analyze();
        dd($analyze->analyzeM30());
        return;
        $histories = History::where('interval', 'm1')->where('crypto_id', 1)->orderBy('created_at', 'desc')->limit(2)->get();
        dd($histories);
        $object = json_decode($temp->last_record);
        dd($object->current_price);
        return;
        $client = new CoinGeckoClient();
        dd($client->coinList());
    }
}
