<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('title')
Chi tiết sản phẩm
@endsection

@section('content')

<!-- content -->
<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ Storage::url($product->image) }}" />
                </div>
                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        {{ $product->name }}
                    </h4>
                    <div class="mb-3">
                        <span class="h5">{{ number_format($product->unit_price - $product->discount_price) }}đ</span>
                        <span class="text-muted">
                            @if($product->category_id == 3)
                            /chai
                            @else
                            /kg
                            @endif
                        </span>
                    </div>
                    <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">
                            <i class="fa fa-star star-detail"></i>
                            <i class="fa fa-star star-detail"></i>
                            <i class="fa fa-star star-detail"></i>
                            <i class="fa fa-star star-detail"></i>
                            <i class="fa fa-star-half-o star-detail"></i>
                            <span class="ms-1 star-detail">
                                4.5
                            </span>
                        </div>
                        <span class="text-muted"><i class="fa fa-shopping-cart fa-sm mx-1"></i>154 orders</span>
                        @if($product->quantity <= 0)
                            <span class="ms-2" style="color: red;">Out stock</span>
                            @else
                            <span class="text-success ms-2">In stock</span>
                    </div>
                    <div class="row">
                        <dt class="col-4">Mã sản phẩm:</dt>
                        <dd class="col-8">{{$product->code}}</dd>

                        <dt class="col-4">Loại</dt>
                        <dd class="col-8">{{$product->category_name}}</dd>

                    </div>

                    <hr />
                    <!-- col.// -->
                    <div class="col-md-4 col-6 mb-3">
                        <label class="mb-2 d-block">Số lượng</label>
                        <div class="input-group mb-3" style="width: 170px;">
                            <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                                <i class="fa fa-minus"></i>
                            </button>
                            <input type="text" class="form-control text-center border border-secondary" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                            <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
                <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
                @endif


        </div>
        </main>
    </div>
    </div>
</section>
<!-- content -->

@endsection

@section('js')



@endsection(js)