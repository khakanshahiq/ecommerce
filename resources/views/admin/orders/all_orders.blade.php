@extends('admin.admin_dashboard')
@section('content')


<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">eCommerce</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Orders</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  <div class="ms-auto"><a href="javascript:;" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Order</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										
										<th>Customer Name</th>
										<th>Email</th>
										<th>Status</th>
										<th>Address</th>

										<th>phone</th>
										<th>View Details</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									
									@foreach($orders as $order)
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div>
													<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
												</div>
												<div class="ms-2">
													<h6 class="mb-0 font-14">{{$order->first_name}} {{$order->last_name}}</h6>
												</div>
											</div>
										</td>
										<td>{{$order->email}}</td>
										<td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>{{$order->status}}</div></td>
										<td>{{$order->address}}</td>
										<td>{{$order->phone}}</td>
										<td><a href="{{route('order.detail',$order->id)}}" class="btn btn-primary btn-sm radius-30 px-4">View Details</a></td>
										<td> <a href="{{route('invoice',$order->id)}}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i>Generate Invoice</a>
										</td>
										<td> <a href="{{route('demo')}}" class="btn btn-danger">demo</a>



										<td>
											<div class="d-flex order-actions">
												<a href="javascript:;" class=""><i class='bx bxs-edit'></i></a>
												<a href="javascript:;" class="ms-3"><i class='bx bxs-trash'></i></a>
											</div>
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
