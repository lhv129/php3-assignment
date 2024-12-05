<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
FoodMart
@endsection

@section('content')

<section class="py-3" style="background-image: url('images/background-pattern.jpg');background-repeat: no-repeat;background-size: cover;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-blocks">
                    <div class="banner-ad large bg-info block-1">
                        <div class="swiper main-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories my-3">100% tự nhiên</div>
                                            <h3 class="display-4">Sinh tố tươi & nước ép mùa hè</h3>
                                            <p>Ngoài giải nhiệt, trong sinh tố bơ còn có thành phần dinh dưỡng tốt cho sức khỏe. Trái cây chứa nhiều khoáng chất như sắt, canxi, magiê, phốt pho, kali và kẽm, một số vitamin như vitamin C, vitamin B, vitamin K tăng khả năng miễn dịch của cơ thể.</p>
                                            <a href="{{ route('/san-pham/danh-sach') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Shop Now</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <img src="images/product-thumb-1.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories mb-3 pb-3">100% tự nhiên</div>
                                            <h3 class="banner-title">Heinz Tomato Ketchup</h3>
                                            <p>Mứt, mứt trái cây hay mứt quả là một loại thực phẩm ngọt có thể được tìm thấy ở nhiều nước trên thế giới,nó được chế biến từ nhiều loại trái cây và một số loại củ nấu với đường và một số nguyên liệu khác cho đến độ khô từ 65-70%.</p>
                                            <a href="{{ route('/san-pham/danh-sach') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Shop Collection</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <img src="images/product-thumb-2.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories mb-3 pb-3">100% tự nhiên</div>
                                            <h3 class="banner-title">Heinz Tomato Ketchup</h3>
                                            <p>Mứt, mứt trái cây hay mứt quả là một loại thực phẩm ngọt có thể được tìm thấy ở nhiều nước trên thế giới,nó được chế biến từ nhiều loại trái cây và một số loại củ nấu với đường và một số nguyên liệu khác cho đến độ khô từ 65-70%.</p>
                                            <a href="{{ route('/san-pham/danh-sach') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Shop Collection</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <img src="images/product-thumb-2.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="banner-ad bg-success-subtle block-2" style="background:url('images/ad-image-1.png') no-repeat;background-position: right bottom">
                        <div class="row banner-content p-5">

                            <div class="content-wrapper col-md-7">
                                <div class="categories sale mb-3 pb-3">20% off</div>
                                <h3 class="banner-title">Trái cây & <br>Rau quả</h3>
                                <a href="{{ route('/san-pham/danh-sach') }}" class="d-flex align-items-center nav-link">Shop Collection <svg width="24" height="24">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></a>
                            </div>

                        </div>
                    </div>

                    <div class="banner-ad bg-danger block-3" style="background:url('images/ad-image-2.png') no-repeat;background-position: right bottom">
                        <div class="row banner-content p-5">

                            <div class="content-wrapper col-md-7">
                                <div class="categories sale mb-3 pb-3">15% off</div>
                                <h3 class="item-title">Bánh</h3>
                                <a href="{{ route('/san-pham/danh-sach') }}" class="d-flex align-items-center nav-link">Shop Collection <svg width="24" height="24">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- / Banner Blocks -->
            </div>
        </div>
    </div>
</section>
<section class="py-5 overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header d-flex flex-wrap justify-content-between my-5">

                    <h2 class="section-title">Sản phẩm giảm giá</h2>

                    <div class="d-flex align-items-center">
                        <a href="#" class="btn-link text-decoration-none">Tất cả sản phẩm giảm giá →</a>
                        <div class="swiper-buttons">
                            <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                            <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="products-carousel swiper">
                    <div class="swiper-wrapper">
                        
                        @foreach ($products as $index => $product)
                            <div class="product-item swiper-slide">
                                <span class="badge bg-success position-absolute m-3">-{{ number_format($product->discount_price * 100 / $product->unit_price) }}%</span>
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="{{ route('/san-pham/chi-tiet',['id' => $product->id ]) }}" title="Product Title">
                                        <img src="{{ Storage::url($product->image) }}" class="tab-image">
                                    </a>
                                </figure>
                                <h3>{{ $product->name }}</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">{{ number_format($product->unit_price - $product->discount_price) }}đ</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- / products-carousel -->

            </div>
        </div>
    </div>
</section>

@endsection

@section('js')

@endsection(js)