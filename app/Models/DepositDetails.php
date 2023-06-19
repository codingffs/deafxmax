<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositDetails extends Model
{
    protected $table = 'deposit_details';
    protected $fillable = [
        'bank_acc_no',
        'amount',
        'deposit_type',
        'image',
        'user_id',
    ];

    public function user_data()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
