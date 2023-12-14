<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'name', 'categories', 'slug', 'Photo', 'showHome','category_type_id'
    ];


    public function categoryId()
    {
        return CategoryType::getCategoryIdByName($this->category_name);
    }

}
