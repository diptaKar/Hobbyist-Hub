<?php

use App\Models\CategoryType;
use App\Models\SubCategory;


 function getCategories(){

    // $subCategory = SubCategory::find($subCategoryId);
    // $categoryId = $subCategory->categoryId();

    return CategoryType::orderBy('name','ASC')
            // ->with('sub_category')
            ->where('showHome','Yes')
            ->get();
     

 } 
?>