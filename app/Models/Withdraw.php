<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdraw';
    protected $fillable = [
        'user_id',
        'withdraw_type',
        'amount',
        'flag',
        'message',
    ];

    public function user_data()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
