@extends('cart_layout')

@section('content')
     <!-- Ec breadcrumb start -->
     <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Wishlist</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href=" {{url('/')}} ">Home</a></li>
                                <li class="ec-breadcrumb-item active">Wishlist</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec Wishlist page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <!-- Compare Content Start -->
                <div class="ec-wish-rightside col-lg-12 col-md-12">
                    <!-- Compare content Start -->
                    <div class="ec-compare-content">
                        <div class="ec-compare-inner">
                            <div class="row margin-minus-b-30">
                                @if ($wishlist->count() > 0)
                                @foreach ($wishlist as $item)      
                                    @php
                                        $product_attr = DB::table('product_attributes')->where('prod_id', $item->product->id)->get();
                                        $product_attr_first = DB::table('product_attributes')->where('prod_id', $item->product->id)->first();
                                    @endphp
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="{{ url('single-product/'.$item->product->slug) }}" class="image">
                                                    <img class="main-image"
                                                    src="{{ asset('frontend/images/product/'.$product_attr_first->images) }}" alt="Product" />
                                                    <img class="hover-image"
                                                    src="{{ asset('frontend/images/product/'.$product_attr_first->images) }}" alt="Product" />
                                                </a>
                                                <span class="ec-com-remove ec-remove-wish"><a href="" class="remove-wishlist" data-id ="{{ $item->product->id }}">×</a></span>

                                                @if ($product_attr_first->discount)
                                                <span class="percentage">{{$product_attr_first->discount}}%</span> 
                                                @endif

                                                <a href="#" class="quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal_{{$item->product->id}}"><img
                                                        src="{{ asset('frontend/images/icons/quickview.svg') }}" class="svg_img pro_svg"
                                                        alt="" /></a>
                                                <div class="ec-pro-actions">
                                                    <a href="compare.html" class="ec-btn-group compare"
                                                        title="Compare"><img src="{{ asset('frontend/images/icons/compare.svg') }}"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                    <button title="Add To Cart" class="add-to-cart"><a href="{{ route('add.to.cart', $item->product->id) }}"><img
                                                            src="{{ asset('frontend/images/icons/cart.svg') }}" class="svg_img pro_svg"
                                                            alt="" /> Add To Cart</a></button>
                                                    <a href="{{ url('add-to-wishlist/'.$item->product->id) }}" class="ec-btn-group wishlist" title="Wishlist"><img
                                                            src="{{ asset('frontend/images/icons/wishlist.svg') }}"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="{{ url('single-product/'.$item->product->slug) }}"> {{$item->product->product_name}} </a></h5>
                                            <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star"></i>
                                            </div>
                                            <div class="ec-pro-list-desc">{{$item->product->description}}</div>
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
                                                        @foreach ($product_attr as $data)
                                                            
                                                        <li class="{{$loop->first ? 'active' : ''}}"><a href="#" class="ec-opt-clr-img"
                                                                data-src="{{ asset('frontend/images/product/'.$data->images) }}"
                                                                data-src-hover="{{ asset('frontend/images/product/'.$data->images) }}"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:{{$data->color}};"></span></a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif

                                                @if ($product_attr_first->size)
                                                    
                                                <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                    <ul class="ec-opt-size">
                                                        @foreach ($product_attr as $data)
                                                            
                                                        <li class="{{ $loop->first ? 'active' : '' }}"><a href="#" class="ec-opt-sz"
                                                                data-old="$12.00" data-new="$10.00">{{$data->size}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <h4 style="text-align: center">There are no products in your Wishlist</h4>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <!--compare content End -->
                </div>
                <!-- Compare Content end -->
            </div>
        </div>
    </section>

    <script src="{{ asset('frontend/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script>

        $(".remove-wishlist").click(function (e) {
            e.preventDefault();

            // var product_id = $(this).closest('.table-row').find('.prod_id').val();
            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-wishlist') }}',
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