<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'logo',
        'bank_id',
        'who_we_are_ar',
        'who_we_are_en',
        'what_we_do_ar',
        'what_we_do_en',
        'ploicy_ar',
        'ploicy_en',
        'active',
        'mobile',
        'email',
        'website',
    ];
    public function bank(){
        return $this->belongsTo('App\Models\Bank', 'bank_id');
    }
}
