@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.product.type')}}" class="btn btn-info">Add Product</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Product Table</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>SKU</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($types as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td class="py-1">
                                        @if($item->photo && file_exists(public_path('storage/upload/product_images/' . $item->photo)))
                                        <img src="{{ asset('storage/upload/product_images/' . $item->photo) }}" alt="Product Photo" width="100"
                                            height="100">
                                        @else
                                        <img src="https://via.placeholder.com/100x100" alt="No Image" width="100" height="100">
                                        @endif
                                    </td>


                                    <td>{{$item->title}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->sku}}</td>
                                    

                                    <td>
                                        <a href="{{route('product.edit.type', $item->id)}}" class="btn btn-warning">Edit</a>
                                        <a href="{{route('product.delete.type', $item->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
