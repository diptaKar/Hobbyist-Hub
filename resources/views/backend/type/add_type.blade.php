@extends('admin.admin_dashboard')
@section('admin')

<div class="card mx-4 mt-6">
                <div class="card-body">
            
                    <h6 class="card-title">Create Category</h6>
            
                    <form method="POST" action="{{route('store.type')}}" class="forms-sample" enctype="multipart/form-data">
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
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Photo</label>
                            <input class="form-control" name="Photo" type="file" id="image">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Status</label>
                            <select class="form-select form-select-sm mb-3">
                            <option value="1">Active</option>
                                <option value="0">Block</option>
									</select>
                        </div>

                        <div class="mb-3">

                            <label for="status">Show on Home</label>

                                <select name="showHome" id="status" class="form-control">

                                    <option value="Yes">Yes</option>

                                    <option value="No">No</option>

                                </select>

                        </div>
                        
                        <button type="submit" class="btn btn-primary me-2">Create</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>
            
                </div>
            </div>



@endsection