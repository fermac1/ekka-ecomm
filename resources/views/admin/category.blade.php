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
						<li class="has-sub active expand">
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
						<li class="has-sub">
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
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Main Category</h1>
							<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Main Category</p>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add New Category</h4>
                                        @if (Session::has('addMessage'))
                                            <div class="alert alert-success" role="alert"> {{Session::get('addMessage')}} </div>
                                        @endif
										<form method="POST" action=" {{ url('admin/add-cat') }} " enctype="multipart/form-data">
                                            @csrf
											<div class="form-group row">
												<label for="text" class="col-12 col-form-label">Name</label> 
												<div class="col-12">
													<input id="text" name="category_name" class="form-control here slug-title" type="text">
												</div>
											</div>
                                            @error('category_name')
                                            <p class="error">{{$message}}</p>
                                            @enderror

											<div class="form-group row">
												<label for="slug" class="col-12 col-form-label">Slug</label> 
												<div class="col-12">
													<input id="slug" name="slug" class="form-control here set-slug" type="text">
													<small>The ???slug??? is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
												</div>
											</div>

                                            <div class="form-group row">
												<label for="image" class="col-12 col-form-label">Image</label> 
												<div class="col-12">
													<input name="image" class="form-control here set-slug" type="file">
													
												</div>
											</div>

                                            <div class="form-group row">
												<label for="image" class="col-12 col-form-label">Icon</label> 
												<div class="col-12">
													<input name="icon" class="form-control here set-slug" type="file">
													
												</div>
											</div>

											{{-- <div class="form-group row">
												<label class="col-12 col-form-label">Sort Description</label> 
												<div class="col-12">
													<textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control"></textarea>
												</div>
											</div>  --}}

											<div class="form-group row">
												<label class="col-12 col-form-label">Description</label> 
												<div class="col-12">
													<textarea id="fulldescription" name="description" cols="40" rows="4" class="form-control"></textarea>
												</div>
											</div> 
                                            @error('description')
                                            <p class="error">{{$message}}</p>
                                            @enderror

											{{-- <div class="form-group row">
												<label class="col-12 col-form-label">Product Tags <span>( Type and
														make comma to separate tags )</span></label>
												<div class="col-12">
													<input type="text" class="form-control" id="group_tag" name="group_tag" value="" placeholder="" data-role="tagsinput">
												</div>
											</div> --}}

											<div class="row">
												<div class="col-12">
													<button name="submit" type="submit" class="btn btn-primary">Submit</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
                                        @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert"> {{Session::get('message')}} </div>
                                    @endif
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Thumb</th>
													<th>Name</th>
													<th>Sub Categories</th>
													<th>Product</th>
													<th>Total Sell</th>
													<th>Status</th>
													<th>Trending</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($category as $item)
                                                <tr>
													<td>
                                                        <img class="cat-thumb" src="{{ asset('frontend/images/category-image/'. $item->image ) }}" alt="Product Image" />
                                                    </td>
													<td> {{$item->category_name}} </td>
													<td>
                                                        <span class="ec-sub-cat-list">
                                                        <span class="ec-sub-cat-count" title="Total Sub Categories">{{ count($item->subcategory) }}</span>

                                                        @foreach ($item->subcategory as $childitem)
                                                        
                                                            <span class="ec-sub-cat-tag"> {{ $childitem->name }} </span> 
                                                        @endforeach
														
														</span>
													</td>
													<td> 
														@php
															$subcat = $item->subcategory;
															$result = array();
															foreach ($subcat as $key => $sub) {
																array_push($result, $sub->product->toArray());
															}
															$products = call_user_func_array('array_merge', $result);
														@endphp
					
														{{ count($products) }} 
                                                    </td>
													<td>2161</td>
													<td>ACTIVE</td>
													<td><span class="badge badge-success">Top</span></td>
													<td>
														<div class="btn-group">
															<button type="button"
																class="btn btn-outline-success">Info</button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only">Info</span>
															</button>

															<div class="dropdown-menu">
																<a class="dropdown-item" href=" {{ url('admin/edit_category/'. $item->slug ) }} ">Edit</a>
																<a class="dropdown-item" href=" {{ url('admin/delete-cat/'.$item->id) }} ">Delete</a>
															</div>
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
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
@endsection