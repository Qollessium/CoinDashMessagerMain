<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'crypto_id',
        'interval',
        'current_price',
        'high_24h',
        'low_24h',
        'price_change_24h',
        'price_change_percentage_24h',
        'price_change_percentage_1h_in_currency',
        'price_change_percentage_24h_in_currency',
        'price_change_percentage_7d_in_currency',
        'last_updated'
    ];

    protected $casts = [
        'last_updated' => 'datetime'
    ];

    public function crypto(){
        return $this->belongsTo(Crypto::class);
    }
}
