<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersGeolocalisation extends Model
{
    protected $table = 'users_geolocalisation';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

     /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'iso_code', 'country', 'city', 'state', 'state_name', 'postal_code', 'lat', 'lon', 'timezone', 'continent', 'currency',
    ];
}
