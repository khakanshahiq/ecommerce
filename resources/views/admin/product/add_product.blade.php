@extends('admin.admin_dashboard')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Subcategory</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Subcategory</li>
							</ol>
						</nav>
					</div>
				
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<form action="{{route('store.product')}}" method="post"  enctype="multipart/form-data">
											@csrf
                                            <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Category Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
                                            <select class="form-select mb-3" aria-label="Default select example" name="category_id">
									<option selected="" disabled>select category</option>
                                    @foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								    </select>
                                   @error('category_id')
									<span class="text-danger category_id-error">{{$message}}</span>
								   @enderror
									
                                      
											</div>
                                            <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Sucategory Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
                                            <select class="form-select mb-3" aria-label="Default select example" name="sub_category_id">
									<option selected="" disabled>select subcategory</option>
                                    @foreach($subcategories as $subcategory)
									<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
									@endforeach
								    </select>
                                    @error('sub_category_id')
									<span class="text-danger sub_category_id-error">{{$message}}</span>
									@enderror        
									</div>
                                               
										</div>
                                    
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">product Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
												@error('name')
									             <span class="text-danger name-error">{{$message}}</span>
									            @enderror 
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Product Quantity</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="quantity" value="{{ old('quantity') }}"/>
												@error('quantity')
									             <span class="text-danger quantity-error">{{$message}}</span>
									            @enderror 
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Selling Price</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="selling_price" value="{{ old('selling_price') }}"/>
												@error('selling_price')
									             <span class="text-danger selling_price-error">{{$message}}</span>
									            @enderror 
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Discount Price</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="discount_price" value="{{ old('discount_price') }}"/>
												@error('discount_price')
									             <span class="text-danger discount_price-error">{{$message}}</span>
									            @enderror 
											</div>
										</div>
										
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Description</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="description" value="{{ old('description') }}"/>
												@error('description')
									             <span class="text-danger description-error">{{$message}}</span>
									            @enderror 
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Image</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="file" class="form-control" name="image" id="image" accept="image/*"/>
												@error('image')
									             <span class="text-danger image-error">{{$message}}</span>
									            @enderror 
											</div>
										</div>
                                      
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<img src="{{url('upload/no_image.jpg')}}" alt="" id="showImage" width="100" height="100">
                                               
											</div>
										</div>
                                      

										
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
											</div>
										</div>
									</div>
									
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

	


			<script>



$(document).ready(function(){
$('#image').change(function(e){

var reader =new FileReader();
reader.onload=function(e){

$('#showImage').attr('src',e.target.result)

}
reader.readAsDataURL(e.target.files['0'])

})


});


</script>

<script>
 $(document).ready(function(){
$('select[name="category_id"]').on('input',function(){

$('span.text-danger.category_id-error').hide();


})

$('select[name="sub_category_id"]').on('input',function(){

$('span.text-danger.sub_category_id-error').hide();

})

$('input[name="name"]').on('input',function(){

$('span.text-danger.name-error').hide();

})
$('input[name="description"]').on('input',function(){

$('span.text-danger.description-error').hide();

})
$('input[name="image"]').on('input',function(){

$('span.text-danger.image-error').hide();

})
$('input[name="quantity"]').on('input',function(){

$('span.text-danger.quantity-error').hide();

})
$('input[name="selling_price"]').on('input',function(){

$('span.text-danger.selling_price-error').hide();

})
$('input[name="discount_price"]').on('input',function(){

$('span.text-danger.discount_price-error').hide();

})

 }); 
</script>








@endsection