<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = TRUE;
    protected $fillable = [
        'user_id',
        'cart_id',
        'status_id',
        'total_price'
    ];
}
