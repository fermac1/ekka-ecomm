@extends('admin.admin_layout')
@section('sidebar')
    <!-- LEFT MAIN SIDEBAR -->
		<div class="ec-left-sidebar ec-bg-sidebar">
			<div id="sidebar" class="sidebar ec-sidebar-footer">

				<div class="ec-brand">
					<a href="index.html" title="Ekka">
						<img class="ec-brand-icon" src="{{ asset('admin/img/logo/ec-site-logo.png') }}" alt="" />
						<span class="ec-brand-name text-truncate">Ekka</span>
					</a>
				</div>

				<!-- begin sidebar scrollbar -->
				<div class="ec-navigation" data-simplebar>
					<!-- sidebar menu -->
					<ul class="nav sidebar-inner" id="sidebar-menu">
						<!-- Dashboard -->
						<li>
							<a class="sidenav-item-link" href="index.html">
								<i class="mdi mdi-view-dashboard-outline"></i>
								<span class="nav-text">Dashboard</span>
							</a>
							<hr>
						</li>

						<!-- Vendors -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group-outline"></i>
								<span class="nav-text">Vendors</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="vendor-card.html">
											<span class="nav-text">Vendor Grid</span>
										</a>
									</li>

									<li class="">
										<a class="sidenav-item-link" href="vendor-list.html">
											<span class="nav-text">Vendor List</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="vendor-profile.html">
											<span class="nav-text">Vendors Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Users -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group"></i>
								<span class="nav-text">Users</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="users" data-parent="#sidebar-menu">
									<li>
										<a class="sidenav-item-link" href="user-card.html">
											<span class="nav-text">User Grid</span>
										</a>
									</li>

									<li class="">
										<a class="sidenav-item-link" href="user-list.html">
											<span class="nav-text">User List</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="user-profile.html">
											<span class="nav-text">Users Profile</span>
										</a>
									</li>
								</ul>
							</div>
							<hr>
						</li>

						<!-- Category -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-dns-outline"></i>
								<span class="nav-text">Categories</span> <b class="caret"></b>
							</a>
							<div class="collapse show">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="active">
										<a class="sidenav-item-link" href="{{ url('admin/category') }}">
											<span class="nav-text">Main Category</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href=" {{ url('admin/sub_category') }} ">
											<span class="nav-text">Sub Category</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Products -->
						<li class="has-sub active expand">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-palette-advanced"></i>
								<span class="nav-text">Products</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href=" {{ url('admin/add_product') }}">
											<span class="nav-text">Add Product</span>
										</a>
									</li>
                                    <li class="">
										<a class="sidenav-item-link" href=" {{ url('admin/add_product_attribute') }}">
											<span class="nav-text">Add Product Attributes</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="{{ url('admin/product_list') }}">
											<span class="nav-text">List Product</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="product-grid.html">
											<span class="nav-text">Grid Product</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="product-detail.html">
											<span class="nav-text">Product Detail</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Orders -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-cart"></i>
								<span class="nav-text">Orders</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="new-order.html">
											<span class="nav-text">New Order</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="order-history.html">
											<span class="nav-text">Order History</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="order-detail.html">
											<span class="nav-text">Order Detail</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="invoice.html">
											<span class="nav-text">Invoice</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Reviews -->
						<li>
							<a class="sidenav-item-link" href="review-list.html">
								<i class="mdi mdi-star-half"></i>
								<span class="nav-text">Reviews</span>
							</a>
						</li>

						<!-- Brands -->
						<li>
							<a class="sidenav-item-link" href="brand-list.html">
								<i class="mdi mdi-tag-faces"></i>
								<span class="nav-text">Brands</span>
							</a>
							<hr>
						</li>

						<!-- Authentication -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-login"></i>
								<span class="nav-text">Authentication</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
									<li class="">
										<a href="sign-in.html">
											<span class="nav-text">Sign In</span>
										</a>
									</li>
									<li class="">
										<a href="sign-up.html">
											<span class="nav-text">Sign Up</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Icons -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-diamond-stone"></i>
								<span class="nav-text">Icons</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="icons" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="material-icon.html">
											<span class="nav-text">Material Icon</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="font-awsome-icons.html">
											<span class="nav-text">Font Awsome Icon</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="flag-icon.html">
											<span class="nav-text">Flag Icon</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Other Pages -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-image-filter-none"></i>
								<span class="nav-text">Other Pages</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="otherpages" data-parent="#sidebar-menu">
									<li class="has-sub">
										<a href="404.html">404 Page</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
@endsection
@section('content')
    			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Add Product</h1>
							<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Product</p>
						</div>
						<div>
							<a href="{{ url('admin/product_list') }}" class="btn btn-primary"> View All
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Add Product Attributes</h2>
								</div>

                                @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">{{ $message }}</div>
                                @endif
								
								<div class="card-body">
                                    <form action="{{ url('admin/add-prod-attr') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                                            @csrf
									<div class="row ec-vendor-uploads"> 

                                        
                                            
                                            <div class="col-lg-8">
                                                <div class="ec-vendor-upload-detail">
													<div class="row form g-3">

                                                        <div class="col-md-8">
                                                            <label class="form-label">Select Product</label>
                                                            <select name="prod_id" id="Categories" class="form-select">

                                                                @foreach ($product as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->product_name }}</option> 
                                                                @endforeach
                                                               
                                                            </select>
                                                        </div>

                                                        <div class="col-md-12 mb-25">
                                                            <div class="row" id="inner-row">
                                                                <div class="col-md-3">
                                                                    <label for="">Size</label>
                                                                    <input type="text" name="size">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Regular Price<span>( In USD
                                                                        )</span></label>
                                                                    <input type="number" name="regular_price" step="0.01">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="">Sale Price<span>( In USD
                                                                        )</span></label>
                                                                    <input type="number" name="sale_price" step="0.01">
                                                                </div>
                                                                @error('sale_price')
                                                                <p class="error">{{$message}}</p>
                                                                @enderror

                                                                <div class="col-md-3 ec-pro-color">
                                                                    <label for="">Color</label>

																	<select name="color" id="Categories" class="form-select form-control-color">
																		<option value="Red">Red</option> 
																		<option value="Black">Black</option>
																		<option value="Brown">Brown</option>
																		<option value="Yellow">Yellow</option>
																		<option value="White">White</option>
																		<option value="Blue">Blue</option>
																		<option value="Olive">Olive</option>
																		<option value="Cream">Cream</option>
																	</select>
                                                                    {{-- <input type="text" name="color"> --}}
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Select Image</label>
                                                                    <input type="file" name="images" >
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for=""> Quantity</label>
                                                                    <input type="number" name="quantity">
                                                                </div>
                                                                @error('qty')
                                                                <p class="error">{{$message}}</p>
                                                                @enderror

                                                                <div class="col-md-2 mt-5">
                                                                    <button class="mb-25-color-prepend"
                                                                    id="DeleteRow" type="button">
                                                                    <a><i class="mdi mdi-trash-can" style="color: black" title="Delete row"></i></a>
    
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div id="newinput"></div>

                                                                <button id="rowAdder" type="button"
                                                                class="btn btn-dark">
                                                                <i class="mdi mdi-plus-circle-outline" style="color: black" title="Add row"></i>
                                                                </button>
                                                        </div> 

                                                     

                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>

                                                    
												</div>

                                                </div>
                                            </div>

											

									</div>
                                    </form>
								</div>
							
							</div>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->


            <script src="{{ asset('admin/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
			<script type="text/javascript">
				$("#rowAdder").click(function () {
					newRowAdd =
					'<div class="row" id="inner-row">'+
                    '  <div class="col-md-3">'+
                        '<label for="">Size</label>'+
                        '<input type="text" name="size"> </div>'+
                    '<div class="col-md-4">'+
                    '<label for="">Regular Price<span>( In USD)</span></label>'+
                    '<input type="number" name="regular_price" step="0.01"> </div>'+
                    ' <div class="col-md-3">'+
                    '<label for="">Sale Price<span>( In USD )</span></label>'+
                    '<input type="number" name="sale_price" step="0.01"> </div>'+
                    '@error("sale_price")'+
                    '<p class="error">{{$message}}</p> @enderror'+

                    '<div class="col-md-3">'+
                    '<label for="">Color</label>'+
                    '<input type="text" name="color"> </div>'+
                    '<div class="col-md-4">'+
                    '<label for="">Select Image</label>'+
                    '<input type="file" name="image" > </div>'+
                    '<div class="col-md-3">'+
                    '<label for=""> Quantity</label>'+
                    '<input type="number" name="quantity"> </div'+
                    '@error("qty")'+
                    '<p class="error">{{$message}}</p> @enderror'+

					'<div class="col-md-2 mt-5"> ' + 
					'<button class="mb-25-color-prepend" id="DeleteRow" type="button">' +
					'<i class="mdi mdi-trash-can" style="color: black" title="Delete row"></i> </button> </div> </div>' ;
		 
					$('#newinput').append(newRowAdd);
				});
		 
				$("body").on("click", "#DeleteRow", function () {
					$(this).parents("#inner-row").remove();
				})

			
			</script>

@endsection