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

    public function markers($latitude, $longitude, $radius)
    {
        return \DB::select('
            SELECT *, ( 6371 * acos( cos( radians(' . $latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + sin( radians( ' . $latitude . ' ) ) * sin( radians( latitude ) ) ) ) AS distance FROM locations  ORDER BY distance LIMIT 0 , 20;
        ');
    }
}