@extends('admin.admin_dashboard')
@section('content')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Applications</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Invoice</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div id="invoice">
							<div class="toolbar hidden-print">
								<div class="text-end">
									<button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
									
									 
								</div>
								<hr/>
							</div>
							<div class="invoice overflow-auto">
								<div style="min-width: 600px">
									<header>
										<div class="row">
											<div class="col">
												<a href="javascript:;">
													<img src="assets/images/logo-icon.png" width="80" alt="" />
												</a>
											</div>
											<div class="col company-details">
												<h2 class="name">
									<a target="_blank" href="javascript:;">
								{{$userData->first_name}} {{$userData->last_name}}
									</a>
								</h2>
												<div>{{$userData->address}}</div>
												<div>{{$userData->phone}}</div>
												<div>{{$userData->email}}</div>
											</div>
										</div>
									</header>
									<main>
										<div class="row contacts">
											<div class="col invoice-to">
												<div class="text-gray-light">INVOICE TO:</div>
												<h2 class="to">{{$userData->first_name}} {{$userData->last_name}}</h2>
												<div class="address">{{$userData->address}}</div>
												<div class="email"><a href="mailto:john@example.com">{{$userData->email}}</a>
												</div>
											</div>
											<div class="col invoice-details">
												<h1 class="invoice-id">INVOICE 3-2-1</h1>
												<div class="date">Date of Invoice: 01/10/2018</div>
												<div class="date">Due Date: 30/10/2018</div>
											</div>
										</div>
										<table>
											<thead>
												<tr>
													<th>S.no</th>
													<th class="text-left">name</th>
													<th class="text-right">PRICE</th>
													<th class="text-right">HOURS</th>
													<th class="text-right">TOTAL</th>
												</tr>
											</thead>
											<tbody>
											
												@foreach($arr as $item)
												
												<tr>
													<td class="no">{{$item['cart_id']}}</td>
													<td class="text-left">
														<h3>{{$item['product_name']}}</h3></td>
													<td class="unit">{{$item['price']}}Rs</td>
													<td class="qty">{{$item['quantity']}}</td>
													<td class="total">{{$item['price']*$item['quantity']}}</td>
												</tr>
												
                                                @endforeach
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td colspan="2">SUBTOTAL</td>
													<td>{{$subtotal}}</td>
												</tr>
												<tr>
													<td colspan="2"></td>
													<td colspan="2">TAX 25%</td>
													<td>{{$tax}}</td>
												</tr>
												<tr>
													<td colspan="2"></td>
													<td colspan="2">GRAND TOTAL</td>
													<td>{{$totalAmount}}</td>
												</tr>
											</tfoot>
										</table>
										<div class="thanks">Thank you!</div>
										<div class="notices">
											<div>NOTICE:</div>
											<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
										</div>
									</main>
									<footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
								</div>
								<!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
								<div></div>
							</div>
						</div>
					</div>
				</div>

              
			</div>





@endsection
