<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
    <!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
    
@endsection

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
    @session('message')
    <div class="alert alert-success"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>{{ session('message') }}</div>
    @endsession
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Gía nhập</th>
                    <th scope="col">Giảm giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Gía bán</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td scope="row">{{ $product->category_name }}</td>
                        <td scope="row">{{ $product->code }}</td>
                        <td scope="row">{{ $product->name }}</td>
                        <td scope="row">
                            <img src="{{ Storage::url($product->image) }}" alt="Hình ảnh sản phẩm" width="150px">
                        </td>
                        <td scope="row">{{ number_format($product->price) }}đ</td>
                        <td scope="row">{{ number_format($product->discount_price) }}đ</td>
                        <td scope="row">{{ number_format($product->quantity) }}</td>
                        <td scope="row">{{ number_format($product->unit_price) }}đ</td>
                        <td>
                            <form method="POST" action="{{ route('admin/san-pham/xoa', ['id' => $product->id]) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin/san-pham/chinh-sua', ['id' => $product->id]) }}"><button
                                        type="button" class="btn btn-primary">Chỉnh sửa</button></a>
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endsection

    @section('js')
    @endsection(js)
