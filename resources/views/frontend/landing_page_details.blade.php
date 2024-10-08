<!doctype html>
@php
    $rtl = get_session_language()->rtl;
@endphp

@if ($rtl == 1)
    <html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">

    <title>@yield('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto'))</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description', get_setting('meta_description'))" />
    <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords'))">
    @yield('meta')
    <!-- Favicon -->

    @php
        $site_icon = uploaded_asset(get_setting('site_icon'));
    @endphp
    <link rel="icon" href="{{ $site_icon }}">
    <link rel="apple-touch-icon" href="{{ $site_icon }}">

    {{-- goggle fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="{{ asset('public/assets/landingPage') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('public/assets/landingPage') }}/css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="pb-5">
        <div class="container header">
            <div class="row">
                <div class="col-lg-12 text-center mt-3">
                    <a class="testh py-20px mr-3 ml-0" href="{{ route('home') }}">
                        @php
                            $header_logo = get_setting('header_logo');
                        @endphp
                        @if ($header_logo != null)
                            <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}"
                                class="header_logo">
                        @else
                            <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                                class="header_logo">
                        @endif
                    </a>
                    {{-- <a href="#">
                        <img class="img-fluid" src="assets/uploads/logo2.png">
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="container banner pt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 d-block text-center">
                    <h2 class="banner_headind mb-4">{{ $landingPage->title_1 }}</h2>
                    @if ($landingPage->top_video != null)
                        {!! $landingPage->top_video !!}
                    @else
                        @if ($landingPage->image_1 != null)
                            <img class="banner_image" src="{{ uploaded_asset($landingPage->image_1) }}"
                                class="rounded">
                        @endif
                    @endif
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 d-block">
                    <div class="description_1 mt-4">
                        {!! $landingPage->description !!}
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- section 2 --}}
    @if ($landingPage->title_2 != null || $landingPage->description_2 != null || $landingPage->image_2 != null)
        <div id="feature">
            <div class="Container">
                <div class="row">
                    <div class="col-lg-12 text-center mt-3 mb-3">
                        <h3 class="feature_title h1">{{ $landingPage->title_2 }}</h3>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center mt-5">
                        <div class="description_1">
                            {!! $landingPage->description_2 !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        @if ($landingPage->image_2 != null)
                            <img src="{{ uploaded_asset($landingPage->image_2) }}" width="100%"
                                class="rounded feature_image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- video section 1 --}}
    @if ($landingPage->video1_title != null || $landingPage->video1_link != null)
        <div id="video_1" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="h1 mt-5">{{ $landingPage->video1_title }}</h3>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="mt-5 mb-5">
                            {!! $landingPage->video1_link !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- section 2 --}}
    @if ($landingPage->title_3 != null || $landingPage->description_3 != null || $landingPage->image_3 != null)
        <div id="feature">
            <div class="Container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center mt-3 mb-3">
                        <h3 class="feature_title h1">{{ $landingPage->title_3 }}</h3>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center mt-5">
                        <div class="description_1">
                            {!! $landingPage->description_3 !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        @if ($landingPage->image_3 != null)
                            <img src="{{ uploaded_asset($landingPage->image_3) }}" width="100%"
                                class="rounded feature_image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- video section 1 --}}
    @if ($landingPage->video2_title != null || $landingPage->video2_link != null)
        <div id="video_1" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="h1 mt-5">{{ $landingPage->video2_title }}</h3>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="mt-5 mb-5">
                            {!! $landingPage->video2_link !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- mobile section --}}

    <div id="mobile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center mobile">
                    <a href="tel:{{ $landingPage->phone }}">বিস্তারিত জানতে কল করুনঃ
                        {{ $landingPage->phone ?? null }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- review section --}}
    <div id="review">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center text-white mb-5">
                    <h3 class="h1 mt-5">Reviews</h3>
                </div>
            </div>
            <div class="row">
                @if ($landingPage->slide_image_1 != null)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <img src="{{ uploaded_asset($landingPage->slide_image_1) }}" alt="review"
                            class="review_image">
                    </div>
                @endif
                @if ($landingPage->slide_image_2 != null)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <img src="{{ uploaded_asset($landingPage->slide_image_2) }}" alt="review"
                            class="review_image">
                    </div>
                @endif
                @if ($landingPage->slide_image_3 != null)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <img src="{{ uploaded_asset($landingPage->slide_image_3) }}" alt="review"
                            class="review_image">
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- product section --}}
    <div id="product">
        <div class="container">
            <div class="row">
                @foreach ($landingPage->landing_page_products as $key => $flash_deal_product)
                    @php
                        $product = get_single_product($flash_deal_product->product_id);
                    @endphp
                    @if ($product != null && $product->published != 0)
                        @php
                            $product_url = route('product', $product->slug);
                            if ($product->auction_product == 1) {
                                $product_url = route('auction-product', $product->slug);
                            }
                        @endphp
                        @php
                            $cart_added = [];
                        @endphp
                        @php
                            $product_url = route('product', $product->slug);
                            if ($product->auction_product == 1) {
                                $product_url = route('auction-product', $product->slug);
                            }
                        @endphp
                        {{-- <div class="col text-center border-right border-bottom has-transition hov-shadow-out z-1">
                            @include('frontend.partials.product_box_1',['product' => $product])
                        </div> --}}
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                            {{-- new --}}
                            <div class="card" style="width: 18rem;">
                                <a href="{{ $product_url }}" class="">
                                    <img class="card-img-top"
                                        src="{{ $product->thumbnail != null ? my_asset($product->thumbnail->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                        alt="{{ $product->getTranslation('name') }}"
                                        title="{{ $product->getTranslation('name') }}">
                                </a>
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <!-- Product name -->
                                    <h3 class="card-title">
                                        <a href="{{ $product_url }}" class="d-block text-reset hov-text-primary"
                                            title="{{ $product->getTranslation('name') }}">{{ $product->getTranslation('name') }}</a>
                                    </h3>
                                    @if ($product->auction_product == 0)
                                        <!-- Previous price -->
                                        @if (home_base_price($product) != home_discounted_base_price($product))
                                            <div class="disc-amount has-transition">
                                                <del
                                                    class="fw-bolder text-secondary mr-1">{{ home_base_price($product) }}</del>
                                            </div>
                                        @endif
                                        <!-- price -->
                                        <div class="product_price">
                                            <span
                                                class="fw-bolder text-danger">{{ home_discounted_base_price($product) }}</span>
                                        </div>
                                    @endif
                                    @if ($product->auction_product == 1)
                                        <!-- Bid Amount -->
                                        <div class="">
                                            <span
                                                class="fw-700 text-primary">{{ single_price($product->starting_bid) }}</span>
                                        </div>
                                    @endif
                                    {{-- <form action="{{ route('landingCart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="price" value="{{ home_base_price($product) }}">
                                        <button type="submit" class="btn btn-danger mt-2">Order Now</button>
                                    </form> --}}
                                    {{-- <a href="{{ $product_url }}" class="btn btn-danger mt-2">Order Now</a> --}}
                                    <a class="cart-btn absolute-bottom-left w-100 h-35px aiz-p-hov-icon text-white bg-danger fs-13 fw-700 d-flex flex-column justify-content-center align-items-center @if (in_array($product->id, $cart_added)) active @endif"
                                        href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})">
                                        <span class="cart-btn-text">
                                            {{ translate('Add to Cart') }}
                                        </span>
                                        <br>
                                        <span><i class="las la-2x la-shopping-cart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <section class="container mb-5">
        <div class="container-fluid">
            <div class="checkout">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 order">
                        <div class="section_main">
                            <h6 class="text-center my-3"><strong>অর্ডার কনফার্ম করতে আপনার নাম, ঠিকানা, মোবাইল নাম্বার
                                    লিখে অর্ডার কনফার্ম করুন বাটনে ক্লিক করুন</strong></h6>

                            <form class="form-default" data-toggle="validator"
                                action="{{ route('checkout.without_auth') }}" role="form" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="customer_name" class="form-label">আপনার নাম</label>
                                            <input type="text" class="form-control" name="customer_name"
                                                id="customer_name" value="{{ Auth::user()->name ?? '' }}" required
                                                placeholder="আপনার নাম">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile_number" class="form-label">আপনার মোবাইল নাম্বার</label>
                                            <input type="text" class="form-control" id="mobile_number"
                                                name="phone" placeholder="01900000000" required>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="state" class="col-sm-2 col-form-label">জেলা</label>
                                            <div class="col-sm-10">
                                                <select class="form-control mb-3 aiz-selectpicker rounded-0"
                                                    data-live-search="true" name="state_id" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="state" class="col-sm-2 col-form-label">উপজেলা</label>
                                            <div class="col-sm-10">
                                                <select class="form-control mb-3 aiz-selectpicker rounded-0"
                                                    id="mySelect" onchange="getValue()" data-live-search="true"
                                                    name="city_id" required>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="shipping_charge" id="hidden_shipping_charge"
                                            value="0">

                                        <div class="mb-3">
                                            <label for="full_address" class="form-label">আপনার সম্পূর্ন ঠিকানা</label>
                                            <textarea class="form-control" id="full_address" rows="2" name="address" value="{{ old('address') }}"
                                                required placeholder="আপনার সম্পূর্ন ঠিকানা"></textarea>
                                        </div>
                                        <!--<div class="mb-3 row">-->
                                        <!--    <label for="state" class="col-sm-2 col-form-label">City</label>-->
                                        <!--    <div class="col-sm-10">-->
                                        <!--        <select class="form-control mb-3 aiz-selectpicker rounded-0" onchange="handleCityChange(this)" data-live-search="true" name="city_id" required>-->
                                        <!--        </select>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>

                                <div class="card-header p-4 mt-4 mb-3 border-bottom-0">
                                    <h3 class="fs-16 fw-700 text-dark mb-0">
                                        {{ translate('Select a payment option') }}
                                    </h3>
                                </div>
                                <!-- Agree Box -->
                                <div class="pt-2  fs-14">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" required id="agree_checkbox">
                                        <span class="aiz-square-check"></span>
                                        <span>{{ translate('I agree to the') }}</span>
                                    </label>
                                    <a href="{{ route('terms') }}"
                                        class="fw-700">{{ translate('terms and conditions') }}</a>,
                                    <a href="{{ route('returnpolicy') }}"
                                        class="fw-700">{{ translate('return policy') }}</a> &
                                    <a href="{{ route('privacypolicy') }}"
                                        class="fw-700">{{ translate('privacy policy') }}</a>
                                </div>
                                <div class="row align-items-center pt-3  mb-4">
                                    <!-- Return to shop -->
                                    <div class="col-lg-6 col-12 ">
                                        <a href="{{ route('home') }}" class="btn btn-link fs-14 fw-700 px-0">
                                            <i class="las la-arrow-left fs-16"></i>
                                            {{ translate('Return to shop') }}
                                        </a>
                                    </div>
                                    <!-- Complete Ordert -->
                                    <div class="col-lg-6 col-12  text-right order_btn">
                                        <button type="submit"
                                            class="btn btn-primary fs-14 fw-700 rounded-0 px-4">অর্ডার কনফার্ম
                                            করুন</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 order summary_last">
                        <div class="section_main">
                            <h6 class="text-center my-3"><strong>অর্ডার ইনফরমেশন</strong></h6>
                            <div class="mb-4" id="cart-summary">
                                <div style="overflow-x:auto;">
                                    <table class="table table-bordered responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col"style="width:40px"></th>
                                                <th scope="col" style="width:80px">{{ translate('Product') }}</th>
                                                <th scope="col">{{ translate('Product Name') }}</th>
                                                <th scope="col">{{ translate('Size') }}</th>
                                                <th scope="col" style="width:100px">{{ translate('Price') }}</th>
                                                <th scope="col" style="width:60px">{{ translate('Qty') }}</th>
                                                <th scope="col" style="width:100px">{{ translate('Total Price') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-icon btn-sm btn-soft-primary bg-soft-warning hov-bg-primary btn-circle">
                                                        <i class="las la-trash fs-16"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    {{-- <span class=" ml-0">
                                              <img src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                  class="img-fit size-60px"
                                                  alt="{{ $product->getTranslation('name')  }}"
                                                  onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                          </span> --}}
                                                </td>
                                                <td>
                                                    <span class="fs-14"></span>
                                                </td>
                                                <td>
                                                    <span class="fs-14"></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="opacity-60 fs-12 d-block d-md-none">{{ translate('Price') }}</span>
                                                    <span class="fw-500 fs-13">0</span>
                                                    <!--<div>-->
                                                    <!--    <span class="fw-500 fs-14">Tax : </span>-->
                                                    <!--    <span class="fw-500 fs-14"></span> -->
                                                    <!--</div>-->

                                                </td>
                                                <td>
                                                    <div class="">
                                                        {{-- @if ($cartItem['digital'] != 1 && $product->auction_product == 0)
                                                  <div class="d-flex check_btn aiz-plus-minus ">
                                                      <button
                                                          class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                                                          type="button" data-type="plus"
                                                          data-field="quantity[{{ $cartItem['id'] }}]">
                                                          <i class="las la-plus"></i>
                                                      </button>
                                                      <input type="number" name="quantity[{{ $cartItem['id'] }}]"
                                                          class=" border-0 text-center input-number"
                                                          placeholder="1" value="{{ $cartItem['quantity'] }}"
                                                          min="{{ $product->min_qty }}"
                                                          max="{{ $product_stock->qty }}"
                                                          onchange="updateQuantity({{ $cartItem['id'] }}, this)">
                                                      <button
                                                          class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                                                          type="button" data-type="minus"
                                                          data-field="quantity[{{ $cartItem['id'] }}]">
                                                          <i class="las la-minus"></i>
                                                      </button>
                                                  </div>
                                              @elseif($product->auction_product == 1)
                                                  <span class="fw-500 fs-14">1</span>
                                              @endif --}}
                                                    </div>
                                                </td>

                                                <td>
                                                    <span
                                                        class="opacity-60 fs-12 d-block d-md-none">{{ translate('Total') }}</span>
                                                    <span class="fw-600 fs-16 text-primary"></span>
                                                </td>
                                            </tr>
                                            {{-- @endforeach --}}
                                            <tr>
                                                <td><span class="d-none" id="total_price"></span></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Sub Total</td>
                                                <td class="fw-600 fs-16 text-primary"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Shipping</td>
                                                <td class="fw-600 fs-16 text-primary"> ৳ <span
                                                        id="shipping_charge">0</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Coupon</td>
                                                <td class="fw-600 fs-16 text-primary"> ৳ <span
                                                        id="coupon_charge"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Payable Amount</td>
                                                <td class="fw-600 fs-16 text-primary">৳ <span id="payable_amount">
                                                    </span></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 text-center">
                                        @guest
                                            <strong>অ্যাকাউন্ট থাকলে লগিন করুন</strong> <a
                                                href="{{ route('user.login') }}"
                                                class="btn btn-primary btn-sm ml-2">login</a>
                                        @endguest
                                    </div>
                                    <div class="col-6 text-center">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#couponModal">
                                            কূপন থাকলে এপ্লাই করুন
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
                <button type="button" class="close absolute-top-right btn-icon close z-1 btn-circle bg-gray mr-2 mt-2 d-flex justify-content-center align-items-center" data-dismiss="modal" aria-label="Close" style="background: #ededf2; width: calc(2rem + 2px); height: calc(2rem + 2px);">
                    <span aria-hidden="true" class="fs-24 fw-700" style="margin-left: 2px;">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/assets/landingPage') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/assets/landingPage') }}/js/custom.js"></script>
    <script src="{{ static_asset('assets/js/aiz-core.js?v=') }}{{ rand(1000, 9999) }}"></script>

    <script>
        function showAddToCartModal(id){
            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }
            $('#addToCart-modal-body').html(null);
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.post('{{ route('cart.showCartModal') }}', {_token: AIZ.data.csrf, id:id}, function(data){
                $('.c-preloader').hide();
                $('#addToCart-modal-body').html(data);
                AIZ.plugins.slickCarousel();
                AIZ.plugins.zoom();
                AIZ.extra.plusMinus();
                getVariantPrice();
            });
        }
    </script>
</body>

</html>
