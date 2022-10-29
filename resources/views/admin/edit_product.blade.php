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
									<h2>Edit Product</h2>
								</div>
                                {{-- @if (Session::has('addMessage'))
                                    <div class="alert alert-success" role="alert"> {{Session::get('addMessage')}} </div>
                                @endif --}}

                                @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">{{ $message }}</div>
                                @endif

								<div class="card-body">
                                     <form action="{{ url('admin/update_product/'. $product->id ) }}" method="POST" class="row g-3" enctype="multipart/form-data">
                                        @method('PUT')
                                            @csrf
									<div class="row ec-vendor-uploads">   

										@php
											$colors = explode('|', $product->color);
											$images = explode('|', $product->images);
										@endphp

                                            <div class="col-lg-4">
                                                <div class="ec-vendor-img-upload">
                                                    <div class="ec-vendor-main-img">
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' id="imageUpload" class="ec-image-upload"
                                                                    accept=".png, .jpg, .jpeg" name="image"/>
                                                                <label for="imageUpload"><img
                                                                        src="{{ asset('admin/img/icons/edit.svg') }}"
                                                                        class="svg_img header_svg" alt="edit" /></label>
                                                            </div>
                                                            @error('image')
                                                            <p class="error">{{$message}}</p>
                                                            @enderror
                                                            <div class="avatar-preview ec-preview">
                                                                <div class="imagePreview ec-div-preview">
                                                                    <img class="ec-image-preview"
                                                                        src="{{ asset('admin/img/products/vender-upload-preview.jpg') }}"
                                                                        alt="edit" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-upload-set colo-md-12">
                                                         

															<div class="thumb-upload">
																<div class="thumb-edit">
																	<input type='file' id="thumbUpload01"
																		class="ec-image-upload" name="images[]"
																		accept=".png, .jpg, .jpeg" multiple/>
																	<label for="imageUpload"><img
																			src="{{ asset('admin/img/icons/edit.svg') }}"
																			class="svg_img header_svg" alt="edit" /></label>
																</div>
																
																<div class="thumb-preview ec-preview">
																	<div class="image-thumb-preview">
																		<img class="image-thumb-preview ec-image-preview"
																		src="{{ asset('admin/img/products/vender-upload-preview.jpg') }}"
																		alt="edit" />
																	</div>
																</div>
	
															</div>

													@if ($product->images)
														@foreach ($images as $image)
															
														<div class="thumb-upload">
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview" src="{{asset('frontend/images/product/'. $image)}}" alt="edit">
																</div>
															</div>

														</div>
														@endforeach
												
													@endif
															
														

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="ec-vendor-upload-detail">

													<div class="row form g-3">

                                                        <div class="col-md-6">
                                                            <label for="inputEmail4" class="form-label">Product name</label>
                                                            <input type="text" class="form-control slug-title" id="inputEmail4" name="product_name" value="{{ $product->product_name }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Select Categories</label>
                                                            <select name="cat_id" id="Categories" class="form-select">

                                                                @foreach ($category as $item)
                                                                <optgroup label="{{ $item->category_name }}">
                                                                    @foreach ($item->subcategory as $childitem)
                                                                    <option value="{{ $childitem->id }}">{{ $childitem->name }}</option> 
                                                                @endforeach
                                                                   
                                                                </optgroup>
                                                                    @endforeach
                                                               
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="slug" class="col-12 col-form-label">Slug</label> 
                                                            <div class="col-12">
                                                                <input id="slug" name="slug" class="form-control here set-slug" type="text" value="{{$product->slug}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Sort Description</label>
                                                            <textarea class="form-control" rows="2" name="description">{{ $product->description }}</textarea>
                                                        </div>
                                                        @error('description')
                                                        <p class="error">{{$message}}</p>
                                                        @enderror
                                                        
														<div class="col-md-6 mb-25 mb-25-color">
                                                            <label class="form-label">Colors</label>

															@foreach ($colors as $color)
																
															<div id="row">
																<div id="inner-row">
																	<input type="color" class="form-control form-control-color"
																		id="exampleColorInput1" value="{{$color}}"
																		title="Choose your color" name="color[]">
	
																	<button class="mb-25-color-prepend"
																		id="DeleteRow" type="button">
																		<a><i class="mdi mdi-trash-can" style="color: black" title="Delete color"></i></a>
																		
																	</button>
																</div>
															</div>
															@endforeach

															<div id="newinput"></div>

															<button id="rowAdder" type="button"
																class="btn btn-dark">
																<i class="mdi mdi-plus-circle-outline" style="color: black" title="Add color"></i>
															</button>

                                                        </div>

                                                        <div class="col-md-8 mb-25">
                                                            <label class="form-label">Size</label>
                                                            <div class="form-checkbox-box">
                                                                <div class="form-check form-check-inline">
                                                                    <input type="checkbox" name="size[]" value="S">
                                                                    <label>S</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="checkbox" name="size[]" value="M">
                                                                    <label>M</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="checkbox" name="size[]" value="L">
                                                                    <label>L</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="checkbox" name="size[]" value="XL">
                                                                    <label>XL</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="checkbox" name="size[]" value="XXL">
                                                                    <label>XXL</label>
                                                                </div>
                                                            </div>
                                                        </div> 

                                                        <div class="col-md-6">
                                                            <label class="form-label">Regular Price <span>( In USD
                                                                    )</span></label>
                                                            <input type="number" class="form-control" id="price1" name="regular_price" value="{{$product->regular_price}}">
                                                        </div>
                                                        @error('regular_price')
                                                        <p class="error">{{$message}}</p>
                                                        @enderror

                                                        <div class="col-md-6">
                                                            <label class="form-label">Sale Price <span>( In USD
                                                                    )</span></label>
                                                            <input type="number" class="form-control" id="price1" name="sale_price" value="{{$product->sale_price}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Quantity</label>
                                                            <input type="number" class="form-control" id="quantity1" name="quantity" value="{{$product->qty}}">
                                                        </div>
                                                        @error('quantity')
                                                        <p class="error">{{$message}}</p>
                                                        @enderror

                                                        <div class="col-md-6">
                                                            <label class="form-label">Status</label>
                                                            <select name="status"  class="form-select">

                                                                <option value="New">New</option> 
                                                                
                                                                <option value="Sale">Sale</option> 
                                                               
                                                            </select>
                                                        </div>
                                                        @error('status')
                                                        <p class="error">{{$message}}</p>
                                                        @enderror

                                                        <div class="col-md-6">
                                                            <label class="form-label">SKU</label>
                                                            <input type="text" class="form-control" name="SKU" value="{{$product->SKU}}">
                                                        </div>
                                                      

                                                        <div class="col-md-6">
                                                            <label class="form-label">Featured</label>
                                                            <select name="featured"  class="form-select">

                                                                <option value="Yes">Yes</option> 
                                                                
                                                                <option value="No">No</option> 
                                                               
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label">Stock</label>
                                                            <select name="stock"  class="form-select">

                                                                <option value="In-stock">In-stock</option> 
                                                                
                                                                <option value="Out-of-stock">Out-of-stock</option> 
                                                               
                                                            </select>
                                                        </div>
                                                        @error('stock')
                                                        <p class="error">{{$message}}</p>
                                                        @enderror

                                                        <div class="col-md-12">
                                                            <label class="form-label">Full Detail</label>
                                                            <textarea class="form-control" rows="4" name="full_detail">{{$product->full_detail}}</textarea>
                                                        </div>
{{-- 
                                                        <div class="col-md-12">
                                                            <label class="form-label">Product Tags <span>( Type and
                                                                    make comma to separate tags )</span></label>
                                                            <input type="text" class="form-control" id="group_tag"
                                                                name="group_tag" value="" placeholder=""
                                                                data-role="tagsinput" />
                                                        </div> --}}

                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>

                                                    {{-- </form> --}}
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
					'<div id="inner-row">'+
					'<input type="color" name="color[]" class="form-control form-control-color" id="exampleColorInput1" value="#ff6191" title="Choose your color" > ' + 
					'<button class="mb-25-color-prepend" id="DeleteRow" type="button">' +
					'<i class="mdi mdi-trash-can" style="color: black"></i> </button> </div>' ;
		 
					$('#newinput').append(newRowAdd);
				});
		 
				$("body").on("click", "#DeleteRow", function () {
					$(this).parents("#inner-row").remove();
				})
			</script>
@endsection