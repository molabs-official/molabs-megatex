<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','user_id','card_id','customer_id','address','address_1','address_2','address_3','address_4','business_name','shipping_method','card_type',
        'stripe_card','stripe_customer','charge_id','stripe_token_id'];
}
