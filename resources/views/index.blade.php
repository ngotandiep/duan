@extends('layouts.app')
@section('title')
    Trang chủ
@endsection
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            @foreach ($banners as $banner)
                <div class="hero__items set-bg" data-setbg="{{ asset('storage/images/banners/' . $banner->srcImage) }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-8">
                                <div class="hero__text">
                                    <h6>Bộ sưu tập mùa hè</h6>
                                    <h2>{{ $banner->name }}</h2>
                                    <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                        commitment to exceptional quality.</p>
                                    <a href="{{ route('listProduct') }}"
                                        class="primary-btn d-flex justify-content-center align-items-center">
                                        <div>Mua ngay </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 d-flex flex-column align-items-center">
            <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img src="{{ asset('storage/img/banner/banner-1.jpg') }}" alt="">
                    </div>
                    <div class="banner__item__text mt-3 text-center">
                        <h2>Bộ Sưu Tập 2024</h2>
                        <a href="{{ route('listProduct') }}">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-column align-items-center">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img src="{{ asset('storage/img/banner/banner-2.jpg') }}" alt="">
                    </div>
                    <div class="banner__item__text mt-3 text-center">
                        <h2>Phụ Kiện</h2>
                        <a href="{{ route('listProduct') }}">Mua ngay</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex flex-column align-items-center">
            <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img  src="{{ asset('storage/img/banner/banner-3.jpg') }}" alt="">
                    </div>
                    <div class="banner__item__text mt-3 text-center">
                        <h2>Giày thể thao</h2>
                        <a href="{{ route('listProduct') }}">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Sản Phẩm</span>
                        <h2>Được Quan Tâm Nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item sale">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('storage/images/products/' . $product->image->srcImage) }}">
                                <span class="label">Sale</span>
                                <ul class="product__hover">
                                    <li><a style="cursor: pointer" onclick="add_heart({{ $product->id }})"><img
                                                src="{{ asset('storage/img/icon/heart.png') }}" alt=""
                                                id="Myheart_{{ $product->id }}">
                                            <span>Yêu thích</span></a></li>
                                    <li><a data-toggle="modal" data-target="#compare" style="cursor: pointer"
                                            onclick="add_compare({{ $product->id }})"><img
                                                src="{{ asset('storage/img/icon/compare.png') }}" alt="">
                                            <span>So sánh</span></a></li>
                                    <li><a href="{{ route('detailProduct', $product->id) }}"><img
                                                src="{{ asset('storage/img/icon/search.png') }}" alt=""><span>Chi tiết</span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $product->name }}</h6>
                                <a href="{{ route('detailProduct', $product->id) }}" class="add-cart">+ Mua ngay</a>
                                <h5>
                                    <span class="format-currency">{{ $product->priceSale }}đ</span>
                                    <del><span class="format-currency">{{ $product->price }}đ</span></del>
                                </h5>

                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $product->id }}">
                    <input type="hidden" id="wishlist_name{{ $product->id }}" value="{{ $product->name }}">
                    <input type="hidden" id="wishlist_image{{ $product->id }}"
                        value="{{ URL::to('storage/images/products/' . $product->image->srcImage) }}">
                    <input type="hidden" id="wishlist_pricesale{{ $product->id }}" value="{{ $product->priceSale }}">
                    <input type="hidden" id="wishlist_price{{ $product->id }}" value="{{ $product->price }}">
                    <input type="hidden" id="wishlist_url{{ $product->id }}"
                        value="{{ URL::to('/detail-product/' . $product->id) }}">
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    {{-- <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="{{ asset('storage/img/product-sale.png') }}" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>$29.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Multi-pocket Chest Bag Black</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    {{-- <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('storage/img/instagram/instagram-1.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('storage/img/instagram/instagram-2.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('storage/img/instagram/instagram-3.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('storage/img/instagram/instagram-4.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('storage/img/instagram/instagram-5.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('storage/img/instagram/instagram-6.jpg') }}"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                        <h3>#Male_Fashion</h3>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Instagram Section End -->


    <!-- Latest Blog Section Begin -->
    <section class="hand-crafted py-5">
        <div class="container py-md-3">
            <div class="row banner-grids">
                <div class="col-md-6 banner-image">
                    <div class="effect-w3">
                        <img src="https://innhanh247.vn/wp-content/uploads/2021/06/Tag-quan-ao-Zara.jpg?v=1622798922" alt="" class="img-fluid image1">

                    </div>

                </div>
                <div class="col-md-6 last-img pl-lg-5 p-3">
                    <h3 class="tittle mb-lg-5 mb-3"><span class="sub-tittle">Giới thiệu về </span>ZaRa</h3>
                    <p class="mb-4">Zara là thương hiệu thời trang hàng đầu thế giới, nổi tiếng với phong cách hiện đại, tinh tế và luôn đón đầu xu hướng. Với sự kết hợp hoàn hảo giữa chất lượng và thiết kế độc đáo, Zara mang đến những bộ sưu tập thời trang đa dạng, từ trang phục sở hữu thanh lịch đến phong cách dạo phố trẻ trung, năng động. Mỗi sản phẩm đều được chăm chút tỉ mỉ từ khâu số lựa chọn chất liệu đến thiết kế, giúp người mặc tỏa sáng ở mọi hoàn cảnh. Zara không chỉ là thời trang mà còn là tuyên ngôn cá tính cho những ai yêu thích sự đẳng cấp và sáng tạo..</p>
                    <ul class="tic-info list-unstyled">
                        <li>

                            <span class="fa fa-check mr-2"></span> Miễn phí ship

                        </li>
                        <li>

                            <span class="fa fa-check mr-2"></span> HOÀN TRẢ MIỄN PHÍ

                        </li>
                        <li>

                            <span class="fa fa-check mr-2"></span> GIẢM GIÁ THÀNH VIÊN

                        </li>
                        <li>

                            <span class="fa fa-check mr-2"></span> HỖ TRỢ


                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <section class="testimonials py-5">
        <div class="container">
            <div class="test-info text-center">
                <h3 class="my-md-2 my-3">Đánh giá</h3>

                <ul class="list-unstyled w3layouts-icons clients">
                    <li>
                        <a href="#">
                            <span class="fa fa-star"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fa-star"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fa-star"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fa-star-half-o"></span>
                        </a>
                    </li>
                </ul>
                <p><span class="fa fa-quote-left"></span>
                Sản phẩm của chúng tôi là sự kết hợp hoàn hảo giữa chất lượng và thiết kế tinh tế,
                 mang đến trải nghiệm vượt trội cho người dùng. Với vật liệu cao cấp, bền bỉ và an toàn,
                 sản phẩm không chỉ đẹp mắt mà còn thân thiện với môi trường. Thiết kế hiện đại và đa dạng về màu sắc,
                  kiểu dáng giúp dễ dàng phối hợp với nhiều phong cách sống khác nhau.

<span class="fa fa-quote-right"></span></p>

            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" ><img src="{{ asset('storage/img/instagram/instagram-1.jpg') }}"  alt=""></div>
                        <div class="instagram__pic__item set-bg" ><img src="{{ asset('storage/img/instagram/instagram-2.jpg') }}"  alt=""></div>
                        <div class="instagram__pic__item set-bg" ><img src="{{ asset('storage/img/instagram/instagram-3.jpg') }}"  alt=""></div>
                        <div class="instagram__pic__item set-bg" ><img src="{{ asset('storage/img/instagram/instagram-4.jpg') }}"  alt=""></div>
                        <div class="instagram__pic__item set-bg" ><img src="{{ asset('storage/img/instagram/instagram-5.jpg') }}"  alt=""></div>
                        <div class="instagram__pic__item set-bg" ><img src="{{ asset('storage/img/instagram/instagram-6.jpg') }}"  alt=""></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Điều quan trọng là phải chăm sóc khách hàng, được khách hàng theo dõi, nhưng điều đó sẽ xảy ra vào thời điểm mà bạn dành nhiều công sức và nỗ lực..</p>
                        <h3>#ZaRa</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
