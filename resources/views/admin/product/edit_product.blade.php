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
										<form action="{{route('update.product')}}" method="post"  enctype="multipart/form-data">
											@csrf
                                            <input type="hidden" name="id" value="{{$editProduct->id}}">
                                            <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Category Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
                                            <select class="form-select mb-3" aria-label="Default select example" name="category_id">
									<option selected="" disabled>select category</option>
                                    @foreach($categories as $category)
									<option value="{{$category->id}}"{{$category->id==$editProduct->category_id ? 'selected':''}}>
                                        {{$category->name}}</option>
									@endforeach
								    </select>
                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
										</div>
                                      
											</div>
                                            <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Sucategory Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
                                            <select class="form-select mb-3" aria-label="Default select example" name="sub_category_id">
									<option selected="" disabled>select subcategory</option>
                                    @foreach($subcategories as $subcategory)
									<option value="{{$subcategory->id}}"{{$subcategory->id==$editProduct->sub_category_id ? 'selected':''}}>{{$subcategory->name}}</option>
									@endforeach
								    </select>
                                            @error('sub_category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
										</div>
                                               
											</div>
                                    
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">product Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="name" value="{{$editProduct->name}}"/>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Description</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
                                            <textarea class="form-control" name="description" rows="3"> {{$editProduct->description}}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Image</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="file" class="form-control" name="image" id="image"/>
                                               
											</div>
										</div>
                                      
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
                                            <img src="{{!empty($editProduct->image)? url('upload/product_image/'.$editProduct->image):url('upload/no_image.jpg')}}" alt="Admin" id="showImage"  width="100px" height="100px">
                                               
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





@endsection