<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['UserID', 'product_name', 'price', 'stock', 'product_description', 'category', 'barcode'];
}
