<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesProducts extends Model
{
    use HasFactory;
    protected $table = 'categories_products';
    public $timestamps = TRUE;
    protected $fillable = [
        'category_id',
        'product_id'
    ];
}
