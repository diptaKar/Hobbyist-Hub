<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\Product; // Assuming your model is named Product
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;
class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {
        // Validate the form data (add more validation rules as needed)
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'mobile' => 'required|string|max:15',
            'subtotal' => 'required|string',
            // Add more validation rules for other fields
        ]);

        try {
            // Use a database transaction to ensure data consistency
            DB::beginTransaction();

            // Create a new order
            $order = order::create([
                'name' => $request->full_name,
                'Address' => $request->address,
                'Phone' => $request->mobile,
                'total_price' => $request->subtotal,
            ]);

            // Fetch product names from the cart and concatenate them
 // Fetch product names from the cart and concatenate them
// Fetch product names from the cart and concatenate them
// Fetch product names from the cart and concatenate them
$cartContent = Cart::content();
$productDescriptions = [];

foreach ($cartContent as $item) {
    $product = Product::find($item->id);

    if ($product) {
        $productDescriptions[] = $product->title . ' X ' . $item->qty;
    } else {
        // Debugging: Log or dump the item data and product data to identify the issue
        \Log::error("Product not found for cart item ID: " . $item->id);
        \Log::error("Cart item details: " . json_encode($item));
        // Alternatively, you can use dump($item) for debugging
        // dump($item);
    }
}

// Combine product descriptions into a single string
$order->p_description = implode(', ', $productDescriptions);


            // Save the order
            $order->save();

            // Commit the transaction
            DB::commit();

            // Redirect or respond accordingly
            return view('front.success');
        } catch (\Exception $e) {
            // Handle exceptions, log them, and roll back the transaction on failure
            DB::rollBack();

            // Optionally, you can return an error view or redirect with a flash message
            return redirect()->back()->with('error', 'Failed to submit the order. Please try again.');
        }
    }


    public function OrderType(){
        $types = order::latest()->get();
        return view('admin.order',compact('types'));
    }

    public function DeleteType($id){
        order::findOrFail($id)->delete();

        return redirect()->back();
    }

    
}