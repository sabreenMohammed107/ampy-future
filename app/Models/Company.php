<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'who_we_are',
        'what_we_do',
        'ploicy',
        'bank_id',
        'active',
    ];
}
