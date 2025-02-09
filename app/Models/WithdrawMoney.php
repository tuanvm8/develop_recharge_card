<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawMoney extends Model
{
    use HasFactory;

    protected $table = 'withdraw_money';
    public $timestamps = true;

    protected $fillable = ['filename', 'title', 'logo'];
}
