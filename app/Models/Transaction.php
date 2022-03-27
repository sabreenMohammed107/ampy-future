<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'month_id',
        'user_id',

        'transaction_date',


    ];
    public function month(){
        return $this->belongsTo('App\Models\Month', 'month_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function transaction_details(){
        return $this->hasMany('App\Models\Transaction_detail');
    }

    // public function account()
    // {
    //     return $this->user->attributes['bank_account'];
    // }
}
