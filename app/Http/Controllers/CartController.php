<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use app\Http\Controllers\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $photo = $product->photo;
    
        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ]);
        }
    
        if (Cart::count() > 0) {
            // Cart is not empty
            $cartContent = Cart::content();
            $productAlreadyExist = false;
    
            foreach ($cartContent as $item) {
                if ($item->id == $product->id) {
                    $productAlreadyExist = true;
                    break; // Exit the loop once a match is found
                }
            }
    
            if (!$productAlreadyExist) {
                $photo = $product->photo; // Assuming $product->photo is a string (URL or path)
                $productImage = (!empty($photo)) ? $photo : '';
    
                Cart::add($product->id, $product->title, 1, $product->price, ['photo' => $productImage]);
                $status = true;
                $message = $product->title . ' added in your cart successfully.';
                session()->flash('success', $message);
            } else {
                $status = false;
                $message = $product->title . ' already added in cart';
            }
        } else {
            // Cart is empty
            $photo = $product->photo; // Assuming $product->photo is a string (URL or path)
            $productImage = (!empty($photo)) ? $photo : '';
    
            Cart::add($product->id, $product->title, 1, $product->price, ['photo' => $productImage]);
            $status = true;
            $message = $product->title . ' added in cart';

            session()->flash('success', $message);
        }
    
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }
    
    
    
    public function cart()
    {
        $cartContent = Cart::content();
        //dd($cartContent);
        
        $data['cartContent'] = $cartContent;
        return view('front.cart', $data);
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty; 

        
    
        // Check Quantity available in stock
        $itemInfo = Cart::get($rowId);
        $product = Product::find($itemInfo->id);
    
        if ($qty <= $product->qty) {
            Cart::update($rowId, $qty);
            $message = 'Cart updated successfully';
            $status = true;
            session()->flash('success', $message);
        } else {
            $message = 'Requested qty('.$qty.') not available in stock.';
            $status = false;
            session()->flash('error', $message);
        }
    
       
    
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function deleteItem(Request $request){
        $itemInfo = Cart::get($request->rowId);
    
        if ($itemInfo == null){
            $errorMessage = 'Item not found in cart';
            session()->flash('error', $errorMessage);
            
            return response()->json([
                'status' => false,
                'message' => $errorMessage
            ]);
        }
    
        Cart::remove($request->rowId);
    
        $message = 'Item removed from cart successfully.';
        session()->flash('success', $message);
    
        return response()->json([
            'status' => true,
            'message' => $message
        ]);
    }

    public function checkout(){
        $cartContent = Cart::content();
        //dd($cartContent);



        if(Cart::count()==0){
            return redirect()->route('front.cart');
        }

        
        

        // return view('front.checkout');
        return view('front.checkout', compact('cartContent'));

    }



    
    
    
}

