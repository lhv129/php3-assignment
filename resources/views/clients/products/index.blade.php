<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
Danh sách sản phẩm
@endsection

@section('content')

<section class="py-5">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="bootstrap-tabs product-tabs">
                    <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                        <h3 class="mt-3">Tất cả sản phẩm</h3>
                        <div class="col-sm-4 offset-sm-2 offset-md-0 col-lg-6 d-none d-lg-block">
                            <div class="search-bar row bg-light p-2 my-2 rounded-4">
                                <div class="col-11 col-md-11">
                                    <form class="text-center" action="{{ route('/san-pham/danh-sach') }}" method="post">
                                        @csrf
                                        <input type="text" class="form-control border-0 bg-transparent" placeholder="Tìm kiếm" name="search"/>
                                    </form>
                                </div>
                                <div class="col-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all">All</a>
                                <a href="#" class="nav-link text-uppercase fs-6" id="nav-fruits-tab" data-bs-toggle="tab" data-bs-target="#nav-fruits">Rau củ & quả</a>
                                <a href="#" class="nav-link text-uppercase fs-6" id="nav-juices-tab" data-bs-toggle="tab" data-bs-target="#nav-juices">Nước ép</a>
                                <a href="#" class="nav-link text-uppercase fs-6" id="nav-breads-tab" data-bs-toggle="tab" data-bs-target="#nav-breads">Bánh</a>
                            </div>
                        </nav>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                @foreach ($products as $index => $product)
                                <div class="col">
                                    <div class="product-item">
                                        @if($product->discount_price > 0)
                                        <span class="badge bg-success position-absolute m-3">-{{ number_format($product->discount_price * 100 / $product->unit_price) }}%</span>
                                        @endif

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
                                </div>
                                @endforeach
                            </div>
                            <!-- / product-grid -->
                        </div>

                        <div class="tab-pane fade" id="nav-fruits" role="tabpanel" aria-labelledby="nav-fruits-tab">
                            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                @foreach ($products as $index => $product)
                                    @if($product->category_id === 1 || $product->category === 2)
                                    <div class="col">
                                        <div class="product-item">
                                            @if($product->discount_price > 0)
                                            <span class="badge bg-success position-absolute m-3">-{{ number_format($product->discount_price * 100 / $product->unit_price) }}%</span>
                                            @endif
    
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
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- / product-grid -->
                        </div>


                        <div class="tab-pane fade" id="nav-juices" role="tabpanel" aria-labelledby="nav-juices-tab">
                            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                @foreach ($products as $index => $product)
                                    @if($product->category_id === 3)
                                    <div class="col">
                                        <div class="product-item">
                                            @if($product->discount_price > 0)
                                            <span class="badge bg-success position-absolute m-3">-{{ number_format($product->discount_price * 100 / $product->unit_price) }}%</span>
                                            @endif
    
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
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- / product-grid -->
                        </div>

                        <div class="tab-pane fade" id="nav-breads" role="tabpanel" aria-labelledby="nav-breads-tab">
                            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                @foreach ($products as $index => $product)
                                    @if($product->category_id === 4)
                                    <div class="col">
                                        <div class="product-item">
                                            @if($product->discount_price > 0)
                                            <span class="badge bg-success position-absolute m-3">-{{ number_format($product->discount_price * 100 / $product->unit_price) }}%</span>
                                            @endif
    
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
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- / product-grid -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')

@endsection(js)