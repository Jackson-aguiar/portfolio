<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    use HasFactory;

    protected $table = 'cart_products';
    public $timestamps = TRUE;
    protected $fillable = [
        'cart_id',
        'product_id'
    ];
}
