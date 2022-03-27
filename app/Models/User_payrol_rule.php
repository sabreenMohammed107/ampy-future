<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_payrol_rule extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'basic_salary',
        'settlements',
        'allowances',
        'taxes',
        'insurance',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
