@extends('admin.admin_dashboard')
@section('admin')

<div class="card mx-4 mt-6">
                <div class="card-body">
            
                    <h6 class="card-title">Add Brand</h6>
            
                    <form method="POST" action="{{route('store.brand.type')}}" class="forms-sample" >
                                    @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" 
                                >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control" >
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary me-2">Create</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>
            
                </div>
            </div>



@endsection