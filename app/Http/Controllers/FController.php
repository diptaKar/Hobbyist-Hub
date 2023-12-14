<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\ProductController;
use App\Models\Product;
use App\Models\CategoryType;
class FController extends Controller
{
    //
    public function FController(){

        $products = Product::where('is_featured','Yes')
                             ->orderBy('id','ASC')
                             ->where('status',1)
                             ->take(4)->get();
        $data['featuredProducts'] = $products;

        $latestProducts = Product::orderBy('id','DESC')
                                   ->where('status',1)
                                   ->take(3)->get();
        
        $data['latestProducts'] = $latestProducts;

        

        return view('front.home',$data);
    }


    public function About(){
        return view('front.about');
    }

    public function Contact(){
        return view('front.contact');
    }

    public function Privacy(){
        return view('front.privacy');
    }

    public function Refund(){
        return view('front.refund');
    }
}
