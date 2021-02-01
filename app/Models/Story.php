<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Story extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table = 'stories';

    protected $fillable = [
        'label',
        'text',
        'house_id',
        'user_id',
        'active',
        'is_approved',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function houses(): HasMany
    {
        return $this->hasMany(House::class, 'house_id', 'id');
    }
}
