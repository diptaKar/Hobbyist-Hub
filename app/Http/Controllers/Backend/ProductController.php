<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\CategoryType;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function ProductType(){
        $types = Product::latest()->get();
        return view('backend.product.all_type',compact('types'));
    }

    public function AddType(){
        $categories = CategoryType::pluck('name', 'id');
        $subCategories = SubCategory::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');


        return view('backend.product.add_type', compact('categories', 'subCategories', 'brands'));
    }

    

    public function StoreType(Request $request)
{
    $request->validate([
        'title' => 'required',
        'slug' => 'required',
        'description' => 'nullable|string',
        'category_type_id' => 'required|integer', // Adjust as needed
        'sub_category_id' => 'nullable|exists:sub_categories,id',
        'brand_id' => 'nullable|exists:brands,id',
        'price' => 'required|numeric|min:0',
        'compare_price' => 'nullable|numeric|min:0',
        'is_featured' => 'required|in:Yes,No',
        'sku' => 'required|string|max:255',
        'barcode' => 'nullable|string|max:255',
        'qty' => 'nullable|integer|min:0',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:1,0',
    ]);

    $filename = null;

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('storage/upload/product_images', $filename, 'public'); // Adjust the storage path as needed
    }

    // Fetch the category_type from the category_types table
    $categoryType = CategoryType::findOrFail($request->category_type_id);

    // Use the correct field names based on your products table
    Product::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'description' => $request->description,
        'category_type_id' => $categoryType->id, // Use the fetched category_id from category_types
        'sub_category_id' => $request->sub_category_id,
        'brand_id' => $request->brand_id,
        'price' => $request->price,
        'compare_price' => $request->compare_price,
        'is_featured' => $request->is_featured,
        'sku' => $request->sku,
        'barcode' => $request->barcode,
        'qty' => $request->qty,
        'photo' => $filename,
        'status' => $request->status,
    ]);
    

    return redirect()->route('products.type');
}


public function EditType($id){
    $types = Product::findorFail($id);
    $categories = CategoryType::pluck('name', 'id');
    $subCategories = SubCategory::pluck('name', 'id');
    $brands = Brand::pluck('name', 'id');
    return view('backend.product.edit_type', compact('types','categories', 'subCategories', 'brands'));
}
    


public function UpdateType(Request $request)
{
    $pid = $request->id;

    $product = Product::findOrFail($pid);

    // Handle file upload if a new photo is provided
    if ($request->hasFile('photo')) {
        // Delete the old photo, if it exists
        if ($product->photo) {
            Storage::disk('public')->delete('storage/upload/product_images/' . $product->photo);
        }

        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('storage/upload/product_images', $filename, 'public'); // Adjust the storage path as needed

        // Update the photo field
        $product->update(['photo' => $filename]);
    } elseif ($request->has('remove_photo') && $request->remove_photo) {
        // If remove_photo is set, delete the old photo
        if ($product->photo) {
            Storage::disk('public')->delete('storage/upload/product_images/' . $product->photo);
            $product->update(['photo' => null]); // Set photo to null in the database
        }
    }

    $categoryType = CategoryType::findOrFail($request->category_type_id);

    // Update other fields
    $product->update([
        'title' => $request->title,
        'slug' => $request->slug,
        'description' => $request->description,
        'category_type_id' => $categoryType->id,
        'sub_category_id' => $request->sub_category_id,
        'brand_id' => $request->brand_id,
        'price' => $request->price,
        'compare_price' => $request->compare_price,
        'is_featured' => $request->is_featured,
        'sku' => $request->sku,
        'barcode' => $request->barcode,
        'qty' => $request->qty,
        'status' => $request->status,
    ]);

    return redirect()->route('products.type');
}


public function DeleteType($id){
    Product::findOrFail($id)->delete();

    return redirect()->back();
}

    
}
