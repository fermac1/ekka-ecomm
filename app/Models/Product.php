<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'slug',
        'cat_id',
        'description',
        'full_detail',
        'status',
        'SKU',
        'featured',
        'brand'
    ]; 

    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'sub_cat_id', 'id');
    }
    public function productAttribute()
    {
        return $this->hasMany(ProductAttribute::class, 'prod_id', 'id');
    }

}
