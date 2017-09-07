<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'icon',
    ];

    public function locations()
    {
        return $this->belongsToMany('App\Location')
            ->withTimestamps();
    }
}
