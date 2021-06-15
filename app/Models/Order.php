<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'address', 'country',
        'credit_card', 'credit_card_expiration',
        'card_cvv'
    ];
}
