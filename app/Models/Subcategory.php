<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'parent_cat_id',
        'description'
    ]; 

    public function maincategory(){
        return $this->belongsTo(Category::class, 'parent_cat_id', 'id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'sub_cat_id');
    }
}
