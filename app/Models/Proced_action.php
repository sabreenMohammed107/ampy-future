<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proced_action extends Model
{
    use HasFactory;
    protected $fillable = [
        'action_date',
        'action_ar',
        'action_en',
        'user_id',

    ];
}
