<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    protected $table = 'bank_details';
    protected $fillable = [
        'bank_name',
        'account_no',
        'ifsc_code',
        'branch_name',
        'user_id',
    ];
}
