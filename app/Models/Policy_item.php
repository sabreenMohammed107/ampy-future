<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_ar',
        'item_en',
        'details_ar',
        'details_en',
        'active',

    ];
}
