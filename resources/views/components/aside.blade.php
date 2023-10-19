		<!--sidebar-wrapper-->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div class="">
					<img src="{{asset('asset/images/logo-icon.png')}}" class="logo-icon-2" alt="" />
				</div>
				<div>
					<h4 class="logo-text">Syndash</h4>
				</div>
				<a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
				</a>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
					<a href="{{url('admin')}}">
						<div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li class="menu-label">Web Apps</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-2"><i class="bx bx-spa"></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
						<li> <a href="{{url('category/create')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
						</li>
						<li> <a href="{{url('category')}}"><i class="bx bx-right-arrow-alt"></i>View Category</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-3"><i class="bx bx-spa"></i>
						</div>
						<div class="menu-title">Sub Category</div>
					</a>
					<ul>
						<li> <a href="{{url('subcategory/create')}}"><i class="bx bx-right-arrow-alt"></i>Add Sub Category</a>
						</li>
						<li> <a href="{{url('subcategory')}}"><i class="bx bx-right-arrow-alt"></i>View Sub Category</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-4"><i class="bx bx-spa"></i>
						</div>
						<div class="menu-title">Supplier</div>
					</a>
					<ul>
						<li> <a href="{{url('supplier/create')}}"><i class="bx bx-right-arrow-alt"></i>Add Supplier</a>
						</li>
						<li> <a href="{{url('supplier')}}"><i class="bx bx-right-arrow-alt"></i>View Supplier</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-5"><i class="bx bx-spa"></i>
						</div>
						<div class="menu-title">Quantity</div>
					</a>
					<ul>
						<li> <a href="{{url('quantity/create')}}"><i class="bx bx-right-arrow-alt"></i>Add Quantity</a>
						</li>
						<li> <a href="{{url('quantity')}}"><i class="bx bx-right-arrow-alt"></i>View Quantity</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-6"><i class="bx bx-spa"></i>
						</div>
						<div class="menu-title">Product</div>
					</a>
					<ul>
						<li> <a href="{{url('product/create')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>
						<li> <a href="{{url('product')}}"><i class="bx bx-right-arrow-alt"></i>View Product</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-7"><i class="bx bx-spa"></i>
						</div>
						<div class="menu-title">Users</div>
					</a>
					<ul>
						<li> <a href="{{url('dashboardUser')}}"><i class="bx bx-right-arrow-alt"></i>View Users</a>
						</li>
					
					</ul>
				</li>

			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar-wrapper-->