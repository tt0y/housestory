<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'telegram_users';

    protected $fillable = ['telegram_user_id', 'telegram_chat_id', 'data'];
}
