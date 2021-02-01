<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    public $timestamps = false;

    protected $table = 'cities';

    protected $fillable = [
        'name',
        'subject_number',
        'country_id'
    ];

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'county_id', 'id');
    }
}
