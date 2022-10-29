<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'prod_id',
        'size',
        'regular_price',
        'sale_price',
        'discount',
        'color',
        'qty',
        'image'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}
