<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table = 'houses';

    protected $fillable = [
        'name',
        'city_id',
        'user_id',
        'street_name',
        'house_no',
        'house_building',
        'postcode',
        'lat',
        'lon',
        'active',
        'is_approved',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'city_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
