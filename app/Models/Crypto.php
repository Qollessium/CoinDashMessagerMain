<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    protected $fillable = [
        'slug',
        'name',
        'identifier',
        'is_activated',
        'last_record'
    ];

    protected $casts = [
        'is_activated' => 'boolean',
        'last_record' => 'object'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function histories(){
        return $this->hasMany(History::class);
    }
}
