<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = TRUE;
    protected $fillable = [
        'name',
        'description',
        'price',
        'width',
        'height',
        'length',
        'weight',
        'url'
    ];
}
