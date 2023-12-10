<?php

namespace App\Helpers\Clients;

use Illuminate\Support\Facades\Http;

class CoinGeckoClient
{
    const URL = "https://api.coingecko.com/api";

    protected function connect(string $url)
    {
        return Http::baseUrl(self::URL)
            ->withHeaders([
                "Accept" => "application/json",
                // "x-cg-pro-api-key" => "CG-R9LXXSHe4jGaqSY2Mcgqjgby",
            ])
            ->get($url);
    }

    protected function getAuthentication(): array
    {
        return [];
    }

    public function coinMarkets(string $vsCurrency, string $ids, int $page, int $perPage, string $order = null, string $priceChangePercentage = '1h,24h,7d'){

        $connect_url = "v3/coins/markets";
        if($vsCurrency != null){ $params['vs_currency'] = $vsCurrency; }
        if($ids != null){ $params['ids'] = $ids; }
        if($order != null){ $params['order'] = $order; }
        if($perPage != null){ $params['per_page'] = $perPage; }
        if($page != null){ $params['page'] = $page; }
        if($priceChangePercentage != null){ $params['price_change_percentage'] = $priceChangePercentage; }

        if($params != "" || $params != null){
            $query_string = http_build_query($params);
            $connect_url = $connect_url . '?' . $query_string;
        }

        return $this->connect($connect_url)->json();
    }

    public function search(string $query){
        $connect_url = "v3/search";
        if($query != null){ $params['query'] = $query; }

        if($params != "" || $params != null){
            $query_string = http_build_query($params);
            $connect_url = $connect_url . '?' . $query_string;
        }

        return $this->connect($connect_url)->json();
    }

    public function coinList(){
        $connect_url = "v3/coins/list";
        return $this->connect($connect_url)->json();
    }
}
