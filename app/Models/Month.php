<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;
    protected $fillable = [
        'month_ar',
        'month_en',
        'year_id',

    ];
    public function year(){
        return $this->belongsTo('App\Models\Year', 'year_id');
    }
}
