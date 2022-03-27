<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',

    ];
    public function months(){
        return $this->hasMany('App\Models\Month', 'year_id','id');
    }
}
