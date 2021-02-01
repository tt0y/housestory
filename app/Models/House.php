<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $table = 'houses';

    protected $fillable = [
        'name',
        'city_id',
        'user_id',
        'address',
        'postcode',
        'lat',
        'lon',
        'active',
        'is_approved',
    ];
}
