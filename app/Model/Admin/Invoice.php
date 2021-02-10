<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id', 'name_buyer', 'email', 'phone', 'address', 'city_buyer', 'coupon_id', 'vat', 'total', 'subtotal', 'date', 'invoice_number',
        'receipt_number', 'status'
    ];
}
