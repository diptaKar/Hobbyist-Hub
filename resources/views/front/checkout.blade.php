@extends('front/layouts/app')

@section('content')

<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href='{{route("front.home")}}'>Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href='{{route("front.shop")}}'>Shop</a></li>
                <li class="breadcrumb-item">Checkout</li>
            </ol>
        </div>
    </div>
</section>

     <section class="section-9 pt-4">
        <div class="container">
        <form method="POST" action="{{ route('order.submit') }}" class="forms-sample" enctype="multipart/form-data">

                            @csrf
                            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <input type="hidden" name="subtotal" value="{{ strval(Cart::subtotal())}}">






               
                            <div class="row">
                                <div class="col-md-8">
                                <div class="sub-title">
                                <h2>Shipping Address</h2>
                                </div>
                                <div class="card shadow-lg border-0">
                                <div class="card-body checkout-form">
                                    <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name">
                                    </div>            
                                </div>

                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>            
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select name="country" id="country" class="form-control">
                                            <option value="">Select a Country</option>
                                            <option value="1">Bangladesh</option>
                                            
                                        </select>
                                    </div>            
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="address" id="address" cols="30" rows="3" placeholder="Address" class="form-control"></textarea>
                                    </div>            
                                </div>




                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No.">
                                    </div>            
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-dark btn-block w-100">Submit Order</button>
                                    </div>
                                </div>
                                

 

                            </div>
                        </form>
                    </div>
                </div>    
            </div>
                        <div class="col-md-4">
                        <div class="sub-title">
                        <h2>Order Summery</h3>
                        </div>                    
                        <div class="card cart-summery">
                        <div class="card-body">
                        @foreach ($cartContent as $item)
                        <div class="d-flex justify-content-between pb-2">
                        <div class="h6">{{ $item->name }} X {{ $item->qty }}</div>
                        <div class="h6">${{ $item->price * $item->qty }}</div>
                        </div>
                        @endforeach

                        <div class="d-flex justify-content-between pb-2">
                        <div class="h6"><strong>Subtotal</strong></div>
                        <div class="h6"><strong>{{ Cart::subtotal() }}</strong></div>
                        </div>

                        </div>
                    </div>

                          
                 
                    
                </div>
            </div>
        </div>
    </section>

@endsection

