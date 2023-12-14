<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
class BrandController extends Controller
{
    //
    public function BrandType(){
        $types = Brand::latest()->get();
        return view('backend.brand.all_type',compact('types'));
    }

    public function AddType(){
        return view('backend.brand.add_type');
    }

    public function StoreType(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            

        ]);
        Brand::insert([
            'name' => $request->name,
            'slug' => $request->slug,
            
        ]);


        return redirect()->route('brand.type');

    }

    public function EditType($id){
        $types = Brand::findorFail($id);
        return view('backend.brand.edit_type', compact('types'));
    }

    public function UpdateType(Request $request){
        $pid = $request->id;
        Brand::findOrFail($pid)->update([
             'name' => $request->name,
             'slug' => $request->slug,
             
         ]);
 
 
         return redirect()->route('brand.type');
 
     }

     public function DeleteType($id){
        Brand::findOrFail($id)->delete();

        return redirect()->back();
    }
}
