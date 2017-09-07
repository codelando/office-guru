<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'address', 'latitude', 'longitude', 'image', 'website',
    ];

    public function services()
    {
        return $this->belongsToMany('App\Service')
            ->withTimestamps();
    }
}