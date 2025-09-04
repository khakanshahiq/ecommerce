@extends('admin.admin_dashboard')
@section('content')


<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Customers</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Customers</li>
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
										<th>customer name</th>
										<th>phone</th>
									
										<th>address</th>
										<th>country</th>
                                        </tr>
								</thead>
								<tbody>
                                    @foreach($customers as $key=>$item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->first_name}} {{$item->last_name}}</td>
										<td>{{$item->phone}}</td>


										<td>{{$item->address}}</td>

										<td>{{$item->country}}</td>
										</tr>
									@endforeach
									
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
				
				
			</div>



@endsection