<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description', 'category_type_id', 'sub_category_id', 'brand_id',
        'price', 'compare_price', 'is_featured', 'sku', 'barcode', 'qty', 'photo', 'status',
    ];

    // public function product_images(){
    //     return $this->hasMany(ProductImage::class);
    // }
    
}
