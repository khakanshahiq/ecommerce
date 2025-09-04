@extends('admin.admin_dashboard')
@section('content')


<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Category</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Category</li>
							</ol>
						</nav>
					</div>
                    @if(session()->has('success'))

                    <div>
                        <span class="alert alert-success" >{{session()->get('success')}}</span>
                    </div>

                    @endif

					<div class="ms-auto">
						<div class="btn-group">
							
                            <a href="{{route('add.category')}}" class="btn btn-primary">Add Category</a>
							
							</button>
							
						</div>
					</div>
				</div>
				
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sn</th>
										<th>Category Name</th>
										<th>category Image</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
                                    @foreach($categories as $key=>$item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->name}}</td>
											
										<td><img src="{{!empty($item->image)? url('upload/category_image/'.$item->image):url('upload/no_image.jpg')}}" width="60" height="40" alt=""></td>
										<td>

                                        <a href="{{route('edit.category',$item->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('delete.category',$item->id)}}" class="btn btn-danger" id="delete">Del</a>

                                        </td>
										
									</tr>
									@endforeach
									
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
				
				
			</div>



@endsection