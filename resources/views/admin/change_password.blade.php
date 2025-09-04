@extends('admin.admin_dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@if(session()->has('error'))
<div class="alert alert-danger">

<p>{{session()->get('error')}}</p>
</div>

@endif

@if(session()->has('success'))
<div class="alert alert-danger">

<p>{{session()->get('success')}}</p>
</div>

@endif
<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profile</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
                        <div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="{{!empty($profilePassword->image) ? url('upload/profile_image/'.$profilePassword->image): url('upload/no_image.jpg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4>{{$profilePassword->name}}</h4>
												<p class="text-secondary mb-1">{{$profilePassword->email}}</p>
												<p class="text-muted font-size-sm">{{$profilePassword->address}}</p>
												<button class="btn btn-primary">Follow</button>
												<button class="btn btn-outline-primary">Message</button>
											</div>
										</div>
										<hr class="my-4" />
									
									</div>
								</div>
							</div>	

                <div class="col-lg-8">
                    <div class="card">
                        <form action="{{route('update.password')}}" method="post">
                            @csrf
                           
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">old password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="old_password"
                                       id="old_password" />
                                     @error('old_password')
                                     <span class="text-danger old_password-error">{{$message}}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">New  Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="new_password"
                                     id="new_password" />
                                     @error('new_password')
                                     <span class="text-danger new_password-error">{{$message}}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Confirm Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="new_password_confirmation"
                                   id="new_password_confirmation" />
                                    
                                </div>
                            </div>
                          
                            
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Change Password" />
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                </div>
						</div>
					</div>
				</div>
			</div>
            <script>

$(document).ready(function(){

$("input[name='old_password']").on('input',function(){


$('span.text-danger.old_password-error').hide();


})

$("input[name='new_password']").on('input',function(){


$('span.text-danger.new_password-error').hide();


})


})


            </script>
      
@endsection
