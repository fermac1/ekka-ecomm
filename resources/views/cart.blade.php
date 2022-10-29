@extends('cart_layout')

@section('content')
        <!-- Ec breadcrumb start -->
        <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row ec_breadcrumb_inner">
                            <div class="col-md-6 col-sm-12">
                                <h2 class="ec-breadcrumb-title">Cart</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Cart</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->
    
        <!-- Ec cart page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                        <!-- cart content Start -->
                        <div class="ec-cart-content">
                            <div class="ec-cart-inner">
                                <div class="row">
                                    <form action="#">
                                        <div class="table-content cart-table-content">
                                            @if(session('cart'))
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                        <th style="text-align: center;">Quantity</th>
                                                        <th>Total</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $total = 0; ?>
                                                    {{-- @if(session('cart')) --}}
                                                    @foreach($cart as $id => $infos)
                                                    <?php $total += $infos['sale_price'] * $infos['qty'] ; ?>
                                                    <tr data-id="{{ $id }}">
                                                        {{-- <input type="hidden" value="{{ $infos['id'] }}" class="product_id"> --}}
                                                
                                                        <td data-label="Product" class="ec-cart-pro-name"><a
                                                                href="{{url('single-product/'.$infos['images'])}}"><img class="ec-cart-pro-img mr-4"
                                                                    src="{{ asset('frontend/images/product/'.$infos['images']) }}"
                                                                    alt="" />{{ $infos['product_name']}}</a></td>
                                                        <td data-label="Price" class="ec-cart-pro-price"><span
                                                                class="amount">${{ $infos['sale_price'] }}</span></td>
                                                        <td data-label="Quantity" class="ec-cart-pro-qty"
                                                            style="text-align: center;">
                                                            <div class="cart-qty-cell">
                                                                <input class="quantity update-cart" type="number"
                                                                    name="qty" value="{{ $infos['qty'] }}" />
                                                            </div>
                                                        </td>
                                                        <td data-label="Total" class="ec-cart-pro-subtotal">${{ $infos['sale_price'] * $infos['qty']  }}</td>
                                                        <td data-label="Remove" class="ec-cart-pro-remove">
                                                            <a href="" class="remove-from-cart" data-id="{{ $infos['id'] }}"><i class="ecicon eci-trash-o"></i></a>
                                                        </td>

                                                        {{-- <td>{{$infos['size']}}:{{$infos['id']}}:{{$infos['color']}} </td> --}}
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                            @else
                                                <h4 style="text-align: center">There are no products in your Cart</h4>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ec-cart-update-bottom">
                                                    <a href="{{ url('continue-shopping') }}">Continue Shopping</a>
                                                    @if (session('cart'))
                                                        
                                                    <button class="btn btn-primary"><a href="{{ url('checkout') }}" style="color: inherit">Check Out</a> </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--cart content End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-cart-rightside col-lg-4 col-md-12">
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Summary Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Summary</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <h4 class="ec-ship-title">Estimate Shipping</h4>
                                    <div class="ec-cart-form">
                                        <p>Enter your destination to get a shipping estimate</p>
                                        <form action="#" method="post">
                                            <span class="ec-cart-wrap">
                                                <label>Country *</label>
                                                <span class="ec-cart-select-inner">
                                                    <select name="ec_cart_country" id="ec-cart-select-country"
                                                        class="ec-cart-select">
                                                        <option selected="" disabled="">United States</option>
                                                        <option value="1">Country 1</option>
                                                        <option value="2">Country 2</option>
                                                        <option value="3">Country 3</option>
                                                        <option value="4">Country 4</option>
                                                        <option value="5">Country 5</option>
                                                    </select>
                                                </span>
                                            </span>
                                            <span class="ec-cart-wrap">
                                                <label>State/Province</label>
                                                <span class="ec-cart-select-inner">
                                                    <select name="ec_cart_state" id="ec-cart-select-state"
                                                        class="ec-cart-select">
                                                        <option selected="" disabled="">Please Select a region, state
                                                        </option>
                                                        <option value="1">Region/State 1</option>
                                                        <option value="2">Region/State 2</option>
                                                        <option value="3">Region/State 3</option>
                                                        <option value="4">Region/State 4</option>
                                                        <option value="5">Region/State 5</option>
                                                    </select>
                                                </span>
                                            </span>
                                            <span class="ec-cart-wrap">
                                                <label>Zip/Postal Code</label>
                                                <input type="text" name="postalcode" placeholder="Zip/Postal Code">
                                            </span>
                                        </form>
                                    </div>
                                </div>
    
                                <div class="ec-sb-block-content">
                                    <div class="ec-cart-summary-bottom">
                                        <div class="ec-cart-summary">
                                            <div>
                                                <span class="text-left">Sub-Total</span>
                                                <span class="text-right">$80.00</span>
                                            </div>
                                            <div>
                                                <span class="text-left">Delivery Charges</span>
                                                <span class="text-right">$80.00</span>
                                            </div>
                                            <div>
                                                <span class="text-left">Coupan Discount</span>
                                                <span class="text-right"><a class="ec-cart-coupan">Apply Coupan</a></span>
                                            </div>
                                            <div class="ec-cart-coupan-content">
                                                <form class="ec-cart-coupan-form" name="ec-cart-coupan-form" method="post"
                                                    action="#">
                                                    <input class="ec-coupan" type="text" required=""
                                                        placeholder="Enter Your Coupan Code" name="ec-coupan" value="">
                                                    <button class="ec-coupan-btn button btn-primary" type="submit"
                                                        name="subscribe" value="">Apply</button>
                                                </form>
                                            </div>
                                            <div class="ec-cart-summary-total">
                                                <span class="text-left">Total Amount</span>
                                                <span class="text-right">$80.00</span>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Summary Block -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- New Product Start -->
        <section class="section ec-new-product section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">New Arrivals</h2>
                            <h2 class="ec-title">New Arrivals</h2>
                            <p class="sub-title">Browse The Collection of Top Products</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- New Product Content -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                        <div class="ec-product-inner">
                            <div class="ec-pro-image-outer">
                                <div class="ec-pro-image">
                                    <a href="product-left-sidebar.html" class="image">
                                        <img class="main-image"
                                            src="{{ asset('frontend/images/product-image/6_1.jpg') }}" alt="Product" />
                                        <img class="hover-image"
                                            src="{{ asset('frontend/images/product-image/6_2.jpg') }}" alt="Product" />
                                    </a>
                                    <span class="percentage">20%</span>
                                    <a href="#" class="quickview" data-link-action="quickview"
                                        title="Quick view" data-bs-toggle="modal"
                                        data-bs-target="#ec_quickview_modal"><img
                                            src="{{ asset('frontend/images/icons/quickview.svg') }}" class="svg_img pro_svg"
                                            alt="" /></a>
                                    <div class="ec-pro-actions">
                                        <a href="compare.html" class="ec-btn-group compare"
                                            title="Compare"><img src="{{ asset('frontend/images/icons/compare.svg') }}"
                                                class="svg_img pro_svg" alt="" /></a>
                                        <button title="Add To Cart" class=" add-to-cart"><img
                                                src="{{ asset('frontend/images/icons/cart.svg') }}" class="svg_img pro_svg"
                                                alt="" /> Add To Cart</button>
                                        <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                src="{{ asset('frontend/images/icons/wishlist.svg') }}"
                                                class="svg_img pro_svg" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Round Neck T-Shirt</a></h5>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>
                                <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                <span class="ec-price">
                                    <span class="old-price">$27.00</span>
                                    <span class="new-price">$22.00</span>
                                </span>
                                <div class="ec-pro-option">
                                    <div class="ec-pro-color">
                                        <span class="ec-pro-opt-label">Color</span>
                                        <ul class="ec-opt-swatch ec-change-img">
                                            <li class="active"><a href="#" class="ec-opt-clr-img"
                                                    data-src="{{ asset('frontend/images/product-image/6_1.jpg') }}"
                                                    data-src-hover="{{ asset('frontend/images/product-image/6_1.jpg') }}"
                                                    data-tooltip="Gray"><span
                                                        style="background-color:#e8c2ff;"></span></a></li>
                                            <li><a href="#" class="ec-opt-clr-img"
                                                    data-src="{{ asset('frontend/images/product-image/6_2.jpg') }}"
                                                    data-src-hover="{{ asset('frontend/images/product-image/6_2.jpg') }}"
                                                    data-tooltip="Orange"><span
                                                        style="background-color:#9cfdd5;"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="ec-pro-size">
                                        <span class="ec-pro-opt-label">Size</span>
                                        <ul class="ec-opt-size">
                                            <li class="active"><a href="#" class="ec-opt-sz"
                                                    data-old="$25.00" data-new="$20.00"
                                                    data-tooltip="Small">S</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                    data-new="$22.00" data-tooltip="Medium">M</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                    data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                        <div class="ec-product-inner">
                            <div class="ec-pro-image-outer">
                                <div class="ec-pro-image">
                                    <a href="product-left-sidebar.html" class="image">
                                        <img class="main-image"
                                            src="{{ asset('frontend/images/product-image/7_1.jpg') }}" alt="Product" />
                                        <img class="hover-image"
                                            src="{{ asset('frontend/images/product-image/7_2.jpg') }}" alt="Product" />
                                    </a>
                                    <span class="percentage">20%</span>
                                    <span class="flags">
                                        <span class="sale">Sale</span>
                                    </span>
                                    <a href="#" class="quickview" data-link-action="quickview"
                                        title="Quick view" data-bs-toggle="modal"
                                        data-bs-target="#ec_quickview_modal"><img
                                            src="{{ asset('frontend/images/icons/quickview.svg') }}" class="svg_img pro_svg"
                                            alt="" /></a>
                                    <div class="ec-pro-actions">
                                        <a href="compare.html" class="ec-btn-group compare"
                                            title="Compare"><img src="{{ asset('frontend/images/icons/compare.svg') }}"
                                                class="svg_img pro_svg" alt="" /></a>
                                        <button title="Add To Cart" class=" add-to-cart"><img
                                                src="{{ asset('frontend/images/icons/cart.svg') }}" class="svg_img pro_svg"
                                                alt="" /> Add To Cart</button>
                                        <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                src="{{ asset('frontend/images/icons/wishlist.svg') }}"
                                                class="svg_img pro_svg" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Full Sleeve Shirt</a></h5>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>
                                <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                <span class="ec-price">
                                    <span class="old-price">$12.00</span>
                                    <span class="new-price">$10.00</span>
                                </span>
                                <div class="ec-pro-option">
                                    <div class="ec-pro-color">
                                        <span class="ec-pro-opt-label">Color</span>
                                        <ul class="ec-opt-swatch ec-change-img">
                                            <li class="active"><a href="#" class="ec-opt-clr-img"
                                                    data-src="{{ asset('frontend/images/product-image/7_1.jpg') }}"
                                                    data-src-hover="{{ asset('frontend/images/product-image/7_1.jpg') }}"
                                                    data-tooltip="Gray"><span
                                                        style="background-color:#01f1f1;"></span></a></li>
                                            <li><a href="#" class="ec-opt-clr-img"
                                                    data-src="{{ asset('frontend/images/product-image/7_2.jpg') }}"
                                                    data-src-hover="{{ asset('frontend/images/product-image/7_2.jpg') }}"
                                                    data-tooltip="Orange"><span
                                                        style="background-color:#b89df8;"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="ec-pro-size">
                                        <span class="ec-pro-opt-label">Size</span>
                                        <ul class="ec-opt-size">
                                            <li class="active"><a href="#" class="ec-opt-sz"
                                                    data-old="$12.00" data-new="$10.00"
                                                    data-tooltip="Small">S</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-old="$15.00"
                                                    data-new="$12.00" data-tooltip="Medium">M</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-old="$20.00"
                                                    data-new="$17.00" data-tooltip="Extra Large">XL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                        <div class="ec-product-inner">
                            <div class="ec-pro-image-outer">
                                <div class="ec-pro-image">
                                    <a href="product-left-sidebar.html" class="image">
                                        <img class="main-image"
                                            src="{{ asset('frontend/images/product-image/1_1.jpg') }}" alt="Product" />
                                        <img class="hover-image"
                                            src="{{ asset('frontend/images/product-image/1_2.jpg') }}" alt="Product" />
                                    </a>
                                    <span class="percentage">20%</span>
                                    <span class="flags">
                                        <span class="sale">Sale</span>
                                    </span>
                                    <a href="#" class="quickview" data-link-action="quickview"
                                        title="Quick view" data-bs-toggle="modal"
                                        data-bs-target="#ec_quickview_modal"><img
                                            src="{{ asset('frontend/images/icons/quickview.svg') }}" class="svg_img pro_svg"
                                            alt="" /></a>
                                    <div class="ec-pro-actions">
                                        <a href="compare.html" class="ec-btn-group compare"
                                            title="Compare"><img src="{{ asset('frontend/images/icons/compare.svg') }}"
                                                class="svg_img pro_svg" alt="" /></a>
                                        <button title="Add To Cart" class=" add-to-cart"><img
                                                src="{{ asset('frontend/images/icons/cart.svg') }}" class="svg_img pro_svg"
                                                alt="" /> Add To Cart</button>
                                        <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                src="{{ asset('frontend/images/icons/wishlist.svg') }}"
                                                class="svg_img pro_svg" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Cute Baby Toy's</a></h5>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>
                                <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                <span class="ec-price">
                                    <span class="old-price">$40.00</span>
                                    <span class="new-price">$30.00</span>
                                </span>
                                <div class="ec-pro-option">
                                    <div class="ec-pro-color">
                                        <span class="ec-pro-opt-label">Color</span>
                                        <ul class="ec-opt-swatch ec-change-img">
                                            <li class="active"><a href="#" class="ec-opt-clr-img"
                                                    data-src="{{ asset('frontend/images/product-image/1_1.jpg') }}"
                                                    data-src-hover="{{ asset('frontend/images/product-image/1_1.jpg') }}"
                                                    data-tooltip="Gray"><span
                                                        style="background-color:#90cdf7;"></span></a></li>
                                            <li><a href="#" class="ec-opt-clr-img"
                                                    data-src="{{ asset('frontend/images/product-image/1_2.jpg') }}"
                                                    data-src-hover="{{ asset('frontend/images/product-image/1_2.jpg') }}"
                                                    data-tooltip="Orange"><span
                                                        style="background-color:#ff3b66;"></span></a></li>
                                            <li><a href="#" class="ec-opt-clr-img"
                                                    data-src="{{ asset('frontend/images/product-image/1_3.jpg') }}"
                                                    data-src-hover="{{ asset('frontend/images/product-image/1_3.jpg') }}"
                                                    data-tooltip="Green"><span
                                                        style="background-color:#ffc476;"></span></a></li>
                                            <li><a href="#" class="ec-opt-clr-img"
                                                    data-src="{{ asset('frontend/images/product-image/1_4.jpg') }}"
                                                    data-src-hover="{{ asset('frontend/images/product-image/1_4.jpg') }}"
                                                    data-tooltip="Sky Blue"><span
                                                        style="background-color:#1af0ba;"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="ec-pro-size">
                                        <span class="ec-pro-opt-label">Size</span>
                                        <ul class="ec-opt-size">
                                            <li class="active"><a href="#" class="ec-opt-sz"
                                                    data-old="$40.00" data-new="$30.00"
                                                    data-tooltip="Small">S</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-old="$50.00"
                                                    data-new="$40.00" data-tooltip="Medium">M</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                        <div class="ec-product-inner">
                            <div class="ec-pro-image-outer">
                                <div class="ec-pro-image">
                                    <a href="product-left-sidebar.html" class="image">
                                        <img class="main-image"
                                            src="{{ asset('frontend/images/product-image/2_1.jpg') }}" alt="Product" />
                                        <img class="hover-image"
                                            src="{{ asset('frontend/images/product-image/2_2.jpg') }}" alt="Product" />
                                    </a>
                                    <span class="percentage">20%</span>
                                    <span class="flags">
                                        <span class="new">New</span>
                                    </span>
                                    <a href="#" class="quickview" data-link-action="quickview"
                                        title="Quick view" data-bs-toggle="modal"
                                        data-bs-target="#ec_quickview_modal"><img
                                            src="{{ asset('frontend/images/icons/quickview.svg') }}" class="svg_img pro_svg"
                                            alt="" /></a>
                                    <div class="ec-pro-actions">
                                        <a href="compare.html" class="ec-btn-group compare"
                                            title="Compare"><img src="{{ asset('frontend/images/icons/compare.svg') }}"
                                                class="svg_img pro_svg" alt="" /></a>
                                        <button title="Add To Cart" class=" add-to-cart"><img
                                                src="{{ asset('frontend/images/icons/cart.svg') }}" class="svg_img pro_svg"
                                                alt="" /> Add To Cart</button>
                                        <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                src="{{ asset('frontend/images/icons/wishlist.svg') }}"
                                                class="svg_img pro_svg" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Jumbo Carry Bag</a></h5>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>
                                <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                <span class="ec-price">
                                    <span class="old-price">$50.00</span>
                                    <span class="new-price">$40.00</span>
                                </span>                                                
                                <div class="ec-pro-option">
                                    <div class="ec-pro-color">
                                        <span class="ec-pro-opt-label">Color</span>
                                        <ul class="ec-opt-swatch ec-change-img">
                                            <li class="active"><a href="#" class="ec-opt-clr-img"
                                                    data-src="{{ asset('frontend/images/product-image/2_1.jpg') }}"
                                                    data-src-hover="{{ asset('frontend/images/product-image/2_2.jpg') }}"
                                                    data-tooltip="Gray"><span
                                                        style="background-color:#fdbf04;"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 shop-all-btn"><a href="#">Shop All Collection</a></div>
                </div>
            </div>
        </section>
        <!-- New Product end -->

        <script src="{{ asset('frontend/js/vendor/jquery-3.5.1.min.js') }}"></script>
        <script>
        $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
        </script>
@endsection