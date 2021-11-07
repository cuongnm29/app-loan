<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;
    protected $fillable = [
        'userid',
        'amount',
        'loan_term',
        'pay',
        'remain_amount',
        'pay_count',
        'status'
    ];
}
