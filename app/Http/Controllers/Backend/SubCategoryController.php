<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SubCategory;
use App\Models\CategoryType;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    //
    public function SubType(){
        $types = SubCategory::latest()->get();
        return view('backend.sub.all_type',compact('types'));
    }

    public function AddType(){
        return view('backend.sub.add_type');
    }

    public function storeType(Request $request)
{
    $request->validate([
        'name' => 'required|unique:category_types',
        'categories' => 'required',
        'slug' => 'required',
        'Photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('Photo')) {
        $file = $request->file('Photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('upload/sub_category_images', $filename, 'public'); // Adjust the storage path as needed
    }

    SubCategory::create([
        'name' => $request->name,
        'categories' => $request->categories,
        'slug' => $request->slug,
        'Photo' => $filename ?? null,
        'category_type_id' => 14,
        'showHome' => $request->showHome,
    ]);

    return redirect()->route('sub.type');
}

public function EditType($id){
    $types = SubCategory::findorFail($id);
    return view('backend.sub.edit_type', compact('types'));
}



public function UpdateType(Request $request)
{
    $pid = $request->id;

    $request->validate([
        'name' => 'required|unique:category_types,name,' . $pid,
        'categories' => 'required',
        'slug' => 'required',
        'Photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $subCategory = SubCategory::findOrFail($pid);

    // Handle file upload if a new photo is provided
    if ($request->hasFile('Photo')) {
        // Delete the old photo, if it exists
        if ($subCategory->Photo) {
            Storage::disk('public')->delete('upload/sub_category_images/' . $subCategory->Photo);
        }

        $file = $request->file('Photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('upload/sub_category_images', $filename, 'public'); // Adjust the storage path as needed

        // Update the photo field
        $subCategory->update(['Photo' => $filename]);
    }

    // Update other fields
    $subCategory->update([
        'name' => $request->name,
        'categories' => $request->categories, // Update to the correct column name
        'slug' => $request->slug,
        'showHome' => $request->showHome,
    ]);

    return redirect()->route('sub.type');
}

public function DeleteType($id){
    SubCategory::findOrFail($id)->delete();

    return redirect()->back();
}

public function categoryType()
    {
        return $this->belongsTo(CategoryType::class, 'category_type_id');
    }


}
