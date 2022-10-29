<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'slug',
        'image',
        'icon',
        'description',
        'trending',
        'status'
    ]; 


    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'parent_cat_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }


}
