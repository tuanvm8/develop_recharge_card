<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'contact_info', 'transaction_type', 'name_card', 'quantity', 'card_value', 'total_amount', 'vnp_TxnRef', 'status'
    ];
}
