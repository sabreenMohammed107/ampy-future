<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str ;
class Transaction_detail extends Model
{
    use HasFactory;
    protected $appends = ['net_salary'];
    protected $fillable = [
        'transaction_id',
        'basic_salary',
        'settlements',
        'allowances',
        'taxes',
        'insurance',

    ];
    public function transaction(){
        return $this->belongsTo('App\Models\Transaction');
    }

    public function getNetSalaryAttribute(){


         return $this->attributes['basic_salary']+$this->attributes['settlements']
        +$this->attributes['allowances'] - ($this->attributes['taxes']+$this->attributes['insurance']) ;

    }


}
