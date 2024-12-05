<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
    <!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
    Thêm mới sản phẩm
@endsection

@section('content')
    <form method="POST" action="{{ route('admin/san-pham/them-moi') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label class="form-label">Danh mục:</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $index => $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Mã sản phẩm:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập mã sản phẩm" name="code" value="{{ old('code') }}">
            @error('code')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập tên sản phẩm" name="name" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh sản phẩm:</label>
            <input type="file" class="form-control" placeholder="Mời bạn nhập ảnh sản phẩm" name="image" value="{{ old('image') }}">
            @error('image')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Gía nhập sản phẩm:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập giá nhập" name="price" value="{{ old('price') }}">
            @error('price')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Số lượng:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập số lượng" name="quantity" value="{{ old('quantity') }}">
            @error('quantity')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Gía bán sản phẩm:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập giá bán" name="unit_price" value="{{ old('unit_price') }}">
            @error('unit_price')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
@endsection

@section('js')
@endsection(js)
