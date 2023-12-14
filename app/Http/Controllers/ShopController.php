<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\CategoryType;

class ShopController extends Controller
{
    //
    public function index(Request $request, $categorySlug = null){

        $categories = CategoryType::orderBy('name','ASC')->where('status',1)->get();
        $brands = Brand::orderBy('name','ASC')->get();

        $brandsArray = [];

        if(!empty($request->get('brand'))){
            $brandsArray = explode(',',$request->get('brand'));
            $products = $products->whereIn('brand_id', $brandsArray);


        }
        $brandsArray = $request->get('brand');

        $products = Product::where('status',1);
        if($request->get('price_max') != ''  && $request->get('price_min') != ''){
           
            if ($request->get('price_max') == 10000){
                $products = $products->whereBetween('price', [intval($request->get('price_min')),1000000]);

            } else {
                $products = $products->whereBetween('price', [intval($request->get('price_min')),intval($request->get('price_max'))]);


            } 
           
           

        }



       // $products = Product::where('status',1);


        // Apply filters here
        if (!empty($categorySlug)){
            $category = CategoryType::where('slug', $categorySlug)->first();
            $products = $products->where('category_type_id', $category->id);

        }

        //$products = Product::orderBy('title','DESC')->where('status',1)->get();
        
       // $products = $products->orderBy('title','DESC'); 

        if($request->get('sort') != ''){
            if($request->get('sort') == 'latest'){
                $products = $products->orderBy('id','DESC');
            }else if($request->get('sort') == 'price_asc'){

                $products = $products->orderBy('price','ASC');
            } else{

                $products = $products->orderBy('price','DESC');
            }

        }else{
            $products = $products->orderBy('id','DESC');

        }
        $products = $products->paginate(3);


        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['products'] = $products;
        $data['brandsArray'] = $brandsArray; 
        $data['priceMax'] = (intval($request->get('price_max')) == 0) ? 5000 : $request->get('price_max'); 
        $data['priceMin'] = intval($request->get('price_min')); 

        $data['sort'] = $request->get('sort'); 



        


        return view('front.shop',$data);


    }

    public function product($slug){
        // $slug;
        $product = Product::where('slug',$slug)->first();
        // dd($product);

        if ($product == null){

            abort(404);
        }

        $data['product'] = $product;

        return view('front.product',$data);

    }

    

} 
