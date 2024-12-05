<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
    <!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
    Chỉnh sửa thông tin sản phẩm
@endsection

@section('content')
    @session('message')
        <div class="alert alert-success"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>{{ session('message') }}</div>
    @endsession
    <form method="POST" action="{{ route('admin/san-pham/cap-nhat', ['id' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
        @method ('PUT')
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="mb-3">
            <label class="form-label">Danh mục:</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $index => $category)
                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Mã sản phẩm:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập mã sản phẩm" name="code"
                value="{{ old('code') ? old('code') : $product->code }}">
            @error('code')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập tên sản phẩm" name="name"
                value="{{ old('name') ? old('name') : $product->name }}">
            @error('name')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh sản phẩm:</label>
            <img src="{{ Storage::url($product->image) }}" alt="Hình ảnh sản phẩm" width="150px">
            <input type="file" class="form-control" placeholder="Mời bạn nhập ảnh sản phẩm" name="image"
                value="{{ $product->image }}">
            @error('image')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3" hidden>
            <label class="form-label">Gía nhập sản phẩm:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập giá nhập" name="price"
                value="{{ old('price') ? old('price') : $product->price }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Số lượng:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập số lượng" name="quantity"
                value="{{ old('quantity') ? old('quantity') : $product->quantity }}">
            @error('quantity')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Gía bán sản phẩm:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập giá bán" name="unit_price"
                value="{{ old('unit_price') ? old('unit_price') : $product->unit_price }}">
            @error('unit_price')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Giảm giá:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập giá bán" name="discount_price"
                value="{{ old('discount_price') ? old('discount_price') : $product->discount_price }}">
            @error('discount_price')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>

@endsection

@section('js')
@endsection(js)
