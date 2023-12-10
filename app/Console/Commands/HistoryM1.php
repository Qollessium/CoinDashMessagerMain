<?php

namespace App\Console\Commands;

use App\Helpers\CryptoHelper;
use Illuminate\Console\Command;

class HistoryM1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:history-m1';

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
        $helper = new CryptoHelper();
        $helper->tickHistory();
    }
}
