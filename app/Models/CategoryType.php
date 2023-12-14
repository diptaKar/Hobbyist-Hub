<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sub_category(){
        return $this->hasMany(Subcategory::class);
    }

    public static function getCategoryIdByName($categoryName)
    {
        $categoryType = self::where('name', $categoryName)->first();

        if ($categoryType) {
            return $categoryType->id;
        }

        return null; // or handle the case where the category name is not found
    }
}
