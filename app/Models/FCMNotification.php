<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FCMNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title_ar',
    'title_en',
    'body_ar',
    'body_en',
    ];
}
