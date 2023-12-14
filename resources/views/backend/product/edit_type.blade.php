@extends('admin.admin_dashboard')
@section('admin')

<div class="card mx-4 mt-6">
                <div class="card-body">
            
                    <h6 class="card-title">Edit Category</h6>
            
                    <form method="POST" action="{{ route('product.update.type') }}" class="forms-sample" enctype="multipart/form-data">
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
                        <input type="hidden" name="id" value="{{$types->id}}">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$types->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{$types->slug}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <!-- Use a textarea for a larger space -->
                            <textarea name="description" class="form-control" value="{{$types->description}}" rows="5"></textarea>
                        </div>
                    
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_type_id" class="form-select form-select-sm mb-3" required>
                                @foreach($categories as $categoryId => $categoryName)
                                <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sub_category" class="form-label">Sub Category</label>
                            <select name="sub_category_id" class="form-select form-select-sm mb-3" required>
                                @foreach($subCategories as $subCategoryId => $subCategoryName)
                                <option value="{{ $subCategoryId }}">{{ $subCategoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <select name="brand_id" class="form-select form-select-sm mb-3" required>
                                @foreach($brands as $brandId => $brandName)
                                <option value="{{ $brandId }}">{{ $brandName }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" value="{{$types->price}}">
                        </div>
                        <div class="mb-3">
                            <label for="compare_price" class="form-label">Compare Price</label>
                            <input type="text" name="compare_price" class="form-control" value="{{$types->compare_price}}">
                        </div>
                        <div class="mb-3">
                            <label for="is_featured" class="form-label">Is Featured</label>
                            <select name="is_featured" class="form-select form-select-sm mb-3" required>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                    
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" name="sku" class="form-control" value="{{$types->sku}}">
                        </div>
                        <div class="mb-3">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input type="text" name="barcode" class="form-control" value="{{$types->barcode}}">
                        </div>
                    
                        <div class="mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="text" name="qty" class="form-control" value="{{$types->qty}}">
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input class="form-control" name="photo" type="file" id="image">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select form-select-sm mb-3" required>
                                <option value="1">Active</option>
                                <option value="0">Block</option>
                            </select>
                        </div>
                    
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>
            
                </div>
            </div>



@endsection