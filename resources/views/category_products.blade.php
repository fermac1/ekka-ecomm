@extends('category_layout')

@section('content')

<!-- Ec Shop page -->
<section class="ec-page-content section-space-p">
    <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                    <!-- Shop Top Start -->
                    <div class="ec-pro-list-top d-flex">
                        <div class="col-md-6 ec-grid-list">
                            <div class="ec-gl-btn">
                                <button class="btn btn-grid active"><img src="{{ asset('frontend/images/icons/grid.svg') }}"
                                        class="svg_img gl_svg" alt="" /></button>
                                <button class="btn btn-list"><img src="{{ asset('frontend/images/icons/list.svg') }}"
                                        class="svg_img gl_svg" alt="" /></button>
                            </div>
                        </div>
                        <div class="col-md-6 ec-sort-select">
                            <span class="sort-by">Sort by</span>
                            <div class="ec-select-inner">
                                <select name="ec-select" id="ec-select">
                                    <option selected disabled>Position</option>
                                    <option value="1">Relevance</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3">Name, Z to A</option>
                                    <option value="4">Price, low to high</option>
                                    <option value="5">Price, high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Top End -->

                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row">

                            @foreach ($products as $product)
                                    @php
                                        $product_attr = DB::table('product_attributes')->where('prod_id', $product->id)->get();
                                        $product_attr_first = DB::table('product_attributes')->where('prod_id', $product->id)->first(); 
                                    @endphp
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                         <div class="ec-product-inner">
                                             <div class="ec-pro-image-outer">
                                                 <div class="ec-pro-image">
                                                     <a href="{{ url('single-product/'. $product->slug) }}" class="image">
                                                         <img class="main-image"
                                                             src="{{ asset('frontend/images/product/'. $product_attr_first->images ) }}" alt="Product" />
                                                         <img class="hover-image"
                                                             src="{{ asset('frontend/images/product/'. $product_attr_first->images ) }}" alt="Product" />
                                                     </a>
                                                     @if ($product_attr_first->discount)
                                                     <span class="percentage">{{$product_attr_first->discount}}%</span> 
                                                     @endif
                                                     <a href="#" class="quickview" data-link-action="quickview"
                                                         title="Quick view" data-bs-toggle="modal"
                                                         data-bs-target="#ec_quickview_modal_{{$product->id}}"><img
                                                             src="{{ asset('frontend/images/icons/quickview.svg') }}" class="svg_img pro_svg"
                                                             alt="" /></a>
                                                     <div class="ec-pro-actions">
                                                         <a href="compare.html" class="ec-btn-group compare"
                                                             title="Compare"><img src="{{ asset('frontend/images/icons/compare.svg') }}"
                                                                 class="svg_img pro_svg" alt="" /></a>
                                                        <button title="Add To Cart" class="add-to-cart"><a href="{{ route('add.to.cart', $product->id) }}"> <img
                                                                    src="{{ asset('frontend/images/icons/cart.svg') }}"  class="svg_img pro_svg"
                                                                    alt="" /> Add To Cart </a></button>
                                                         <a href="{{ url('add-to-wishlist/'.$product->id) }}" class="ec-btn-group wishlist" title="Wishlist"><img
                                                                 src="{{ asset('frontend/images/icons/wishlist.svg') }}"
                                                                 class="svg_img pro_svg" alt="" /></a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="ec-pro-content">
                                                 <h5 class="ec-pro-title"><a href="{{ url('single-product/'. $product->slug) }}"> {{$product->product_name}} </a></h5>
                                                 <div class="ec-pro-rating">
                                                     <i class="ecicon eci-star fill"></i>
                                                     <i class="ecicon eci-star fill"></i>
                                                     <i class="ecicon eci-star fill"></i>
                                                     <i class="ecicon eci-star fill"></i>
                                                     <i class="ecicon eci-star"></i>
                                                 </div>
                                                 <div class="ec-pro-list-desc">{{$product->description}}</div>
                                                 <span class="ec-price">
                                                     @if ($product_attr_first->regular_price)
                                                     <span class="old-price">${{ $product_attr_first->regular_price }}</span>
                                                     @endif
                                                     <span class="new-price">${{ $product_attr_first->sale_price }}</span>
                                                 </span>
                                                 <div class="ec-pro-option">
                                                     @if ($product_attr_first->color)
                                                         
                                                     <div class="ec-pro-color">
                                                         <span class="ec-pro-opt-label">Color</span>
                                                         <ul class="ec-opt-swatch ec-change-img">
                                                             @foreach ($product_attr as $item)
                                                                 
                                                             <li class="{{ $loop->first ? 'active' : '' }}"><a href="#" class="ec-opt-clr-img"
                                                                     data-src="{{ asset('frontend/images/product/'.$item->images) }}"
                                                                     data-src-hover="{{ asset('frontend/images/product/'.$item->images) }}"
                                                                     data-tooltip="Gray"><span
                                                                         style="background-color:{{$item->color}};"></span></a></li>
                                                             @endforeach
                                                         </ul>
                                                     </div>
                                                     @endif

                                                     @if ($product_attr_first->size)
                                                         
                                                     <div class="ec-pro-size">
                                                         <span class="ec-pro-opt-label">Size</span>
                                                         <ul class="ec-opt-size">
                                                             @foreach ($product_attr as $item)
                                                                @if ($item->regular_price)
                                                                     
                                                                 <li class="{{ $loop->first ? 'active' : '' }}"><a href="#" class="ec-opt-sz"
                                                                         data-old="${{$item->regular_price}}" data-new="${{$item->sale_price}}">{{$item->size}}</a></li>
                                                                @else

                                                                 <li class="{{ $loop->first ? 'active' : '' }}"><a href="#" class="ec-opt-sz" data-new="${{$item->sale_price}}">{{$item->size}}</a></li>

                                                                @endif
                                                             @endforeach
                                                         </ul>
                                                     </div>
                                                     @endif
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
         
                                     
                            @endforeach

                            </div>
                            
                        </div>

                        <!-- Ec Pagination Start -->
                        {{ $products->links() }}
                        <!-- Ec Pagination End -->
                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                    <div id="shop_sidebar">
                        <div class="ec-sidebar-heading">
                            <h1>Filter Products By</h1>
                        </div>
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Category Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Category</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>

                                        @foreach ($category as $item)
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                
                                                <input type="checkbox" {{ Request::path() === 'category/'.$item->slug ? 'checked' : '' }}/> <a href="{{ url('category/'.$item->slug) }}"> {{$item->category_name}} </a><span
                                                    class="checked"></span>
                                            </div>
                                        </li> 
                                        @endforeach

                                      {{-- @if (Paginate::hasMorePages()) --}}
                                      <li>
                                        <div class="ec-sidebar-block-item ec-more-toggle">
                                            <span class="checked"></span><span id="ec-more-toggle">More
                                                Categories</span>
                                        </div>
                                    </li>
                                      {{-- @endif --}}
                                       
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Size Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Size</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" checked /><a href="#">S</a><span
                                                    class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" /><a href="#">M</a><span
                                                    class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" /> <a href="#">L</a><span
                                                    class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" /><a href="#">XL</a><span
                                                    class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" /><a href="#">XXL</a><span
                                                    class="checked"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Color item -->
                            <div class="ec-sidebar-block ec-sidebar-block-clr">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Color</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#c4d6f9;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#ff748b;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#000000;"></span></div>
                                        </li>
                                        <li class="active">
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#2bff4a;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#ff7c5e;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#f155ff;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#ffef00;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#c89fff;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#7bfffa;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                    style="background-color:#56ffc1;"></span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Price Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Price</h3>
                                </div>
                                <div class="ec-sb-block-content es-price-slider">
                                    <div class="ec-price-filter">
                                        <div id="ec-sliderPrice" class="filter__slider-price" data-min="0"
                                            data-max="250" data-step="10"></div>
                                        <div class="ec-price-input">
                                            <label class="filter__label"><input type="text"
                                                    class="filter__input"></label>
                                            <span class="ec-price-divider"></span>
                                            <label class="filter__label"><input type="text"
                                                    class="filter__input"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- End Shop page -->

@endsection


    