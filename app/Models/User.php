<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'emp_code',
        'n_id',
        'image',
        'mobile',
        'emp_no',
        'job_title',
        'address',
        'company_id',
        'hire_date',
        'bank_account',
        'notes',
        'active',
    ];
    public function company(){
        return $this->belongsTo('App\Models\Company', 'company_id');
    }


    public function transation(){
        return $this->hasMany('App\Models\Transaction','user_id','id')->orderBy("id", "Desc");
      }

      public function latestTransation()
      {
        return $this->hasOne('App\Models\Transaction')->latest();
        //   return $this->transation()->latest();
      }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
