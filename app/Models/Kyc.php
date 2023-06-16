<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    protected $table = 'kyc';
    protected $fillable = [
        'bank_name',
        'act_number',
        'ifsc_code',
        'document1',
        'pancard_number',
        'name_of_holder',
        'document2',
        'user_id',
    ];
}
