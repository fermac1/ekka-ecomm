@extends('admin.admin_layout')

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
						<div class="col-xl-12 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Edit Category</h4>
                                        @if (Session::has('editmessage'))
                                            <div class="alert alert-success" role="alert"> {{Session::get('editmessage')}} </div>
                                        @endif
										<form method="POST" action=" {{ url('admin/update_category/'.$category->id) }} " enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            
											<div class="form-group row">
												<label for="text" class="col-12 col-form-label">Name</label> 
												<div class="col-12">
													<input id="text" name="category_name" class="form-control here slug-title" type="text" value="{{ $category->category_name }}">
												</div>
											</div>
                                            @error('category_name')
                                            <p class="error">{{$message}}</p>
                                            @enderror

											<div class="form-group row">
												<label for="slug" class="col-12 col-form-label">Slug</label> 
												<div class="col-12">
													<input id="slug" name="slug" class="form-control here set-slug" type="text" value="{{ $category->slug }}">
													<small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
												</div>
											</div>

                                            @if ($category->image)
                                                <img src="{{ asset('frontend/images/category-image/'.$category->image) }}" alt="Category image" width="25%" height="25%"/>
                                                
                                            @endif
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
													<textarea id="fulldescription" name="description" cols="40" rows="4" class="form-control"> {{ $category->description }} </textarea>
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
						{{-- <div class="col-xl-8 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
                                        @if (Session::has('deletemessage'))
                                        <div class="alert alert-success" role="alert"> {{Session::get('deletemessage')}} </div>
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
													<td><img class="cat-thumb" src="{{ asset( $item->image ) }}" alt="Product Image" /></td>
													<td> {{$item->category_name}} </td>
													<td>
                                                        <span class="ec-sub-cat-list">
                                                        <span class="ec-sub-cat-count" title="Total Sub Categories">{{ count($item->subcategory) }}</span>

                                                        @foreach ($item->subcategory as $childitem)
                                                        
                                                            <span class="ec-sub-cat-tag"> {{ $childitem->name }} </span> 
                                                        @endforeach
														
														</span>
													</td>
													<td>28</td>
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
																<a class="dropdown-item" href=" {{ url('admin/delete/'.$item->id) }} ">Delete</a>
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
						</div> --}}
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
@endsection