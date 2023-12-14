@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                    <a href="{{route('add.brand.type')}}" class="btn btn-info">Add Brand</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Brand Table</h6>
                
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($types as $key => $item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        

                        <td>
                            <a href="{{route('brand.edit.type', $item->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('brand.delete.type', $item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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