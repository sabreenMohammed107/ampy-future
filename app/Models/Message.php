<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
    'subject',
    'message',
    'suggest_date',

    ];
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
