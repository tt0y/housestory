<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table = 'stories';

    protected $fillable = [
        'house_id',
        'label',
        'text',
        'user_id',
        'active',
        'is_approved',
    ];
}
