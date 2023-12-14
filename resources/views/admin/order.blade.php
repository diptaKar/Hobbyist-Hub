@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
            
				

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Order Table</h6>
                
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Product Data</th>
                        
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($types as $key => $item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->p_description}}</td>
                        <td>{{$item->Address}}</td>
                        <td>{{$item->Phone}}</td>
                        <td>{{$item->total_price}}</td>
                        
                    
                        <td>
                            
                            <a href="{{route('order.delete.type', $item->id)}}" class="btn btn-danger" id="delete">Approved</a>
                        </td>
                      </tr>
                    @endforeach  
                    </tbody>
                  </table>
                  <script src="script.js"></script>
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>


@endsection

