<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    'email',
    'email_verified_at',
    'password',
    'emp_code',
    'n_id',
    'image',
    'mobile',
    'emp_no',
    'job_title_ar',
    'address_ar',
    'job_title_en',
    'address_en',
    'company_id',
    'hire_date',
    'bank_account',
    'notes',
    'register_approved',
    'active',
    'fcm_token',
    'emp_status', // 0=> emp , 1=>admin
    ];
    public function company(){
        return $this->belongsTo('App\Models\Company', 'company_id');
    }


    public function transation(){
        return $this->hasMany('App\Models\Transaction','user_id','id')->where('revision_status',1)->orderBy("id", "Desc");
      }

      public function latestTransation()
      {
        return $this->hasOne('App\Models\Transaction')->where('revision_status',1)->latest();
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
