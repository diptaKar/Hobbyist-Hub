<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoryType;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
class CategoryTypeController extends Controller
{
    //
    public function AllType(){
        $types = CategoryType::latest()->get();
        return view('backend.type.all_type',compact('types'));
    }

    public function AddType(){
        return view('backend.type.add_type');
    }

    public function StoreType(Request $request)
{
    $request->validate([
        'name' => 'required|unique:category_types',
        'slug' => 'required',
        'Photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $filename = null;

    if ($request->hasFile('Photo')) {
        $file = $request->file('Photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('public/storage/upload/category_images', $filename); // Adjust the storage path as needed
    }

    CategoryType::insert([
        'name' => $request->name,
        'slug' => $request->slug,
        'Photo' => $filename,
        'showHome' => $request->showHome,
    ]);

    return redirect()->route('all.type');
}


    public function EditType($id){
        $types = CategoryType::findorFail($id);
        return view('backend.type.edit_type', compact('types'));
    }

    public function UpdateType(Request $request)
{
    $pid = $request->id;
    $category = CategoryType::findOrFail($pid);

    
    if ($request->hasFile('Photo')) {
        
        if ($category->Photo) {
            
            Storage::disk('public')->delete('storage/upload/category_images/' . $category->Photo);
        }

        $file = $request->file('Photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('storage/upload/category_images', $filename, 'public'); // Adjust the storage path as needed

        // Update the photo field
        $category->update(['Photo' => $filename]);
    }

    // Update other fields
    $category->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'showHome' => $request->showHome,
    ]);

    return redirect()->route('all.type');
}


    public function DeleteType($id){
        CategoryType::findOrFail($id)->delete();

        return redirect()->back();
    }
    
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_type_id');
    }

   
}
