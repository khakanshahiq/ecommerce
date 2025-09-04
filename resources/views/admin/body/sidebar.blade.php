<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rukada</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{route('dashboard')}}" >
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Categories</div>
					</a>
					<ul>
						<li> <a href="{{route('all.category')}}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
						</li>
						<li> <a href="{{route('add.category')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
						</li>
						
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Sucategories</div>
					</a>
					<ul>
						<li> <a href="{{route('all.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>All Subcategories</a>
						</li>
						<li> <a href="{{route('add.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>Add Subcategory</a>
						</li>
						
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Product</div>
					</a>
					<ul>
						<li> <a href="{{route('all.product')}}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
						</li>
						<li> <a href="{{route('add.product')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>
						
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Customers</div>
					</a>
					<ul>
						<li> <a href="{{route('all.customer')}}"><i class="bx bx-right-arrow-alt"></i>All Customer</a>
						</li>
						
						
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Orders</div>
					</a>
					<ul>
						<li> <a href="{{route('all.orders')}}"><i class="bx bx-right-arrow-alt"></i>All Orders</a>
						</li>
						<li> <a href="{{route('add.product')}}"><i class="bx bx-right-arrow-alt"></i>Add Order</a>
						</li>
						
						
					</ul>
				</li>
				
				
			
			</ul>
			<!--end navigation-->
		</div>