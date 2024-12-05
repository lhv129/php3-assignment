<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
    <!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
    Thêm mới người dùng
@endsection

@section('content')
    <form method="POST" action="{{ route('admin/nguoi-dung/them-moi') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label class="form-label">Username:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập username" name="name" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh đại diện:</label>
            <input type="file" class="form-control" placeholder="Mời bạn nhập ảnh đại diện" name="avatar" value="{{ old('avatar') }}">
            @error('avatar')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu:</label>
            <input type="password" class="form-control" placeholder="Mời bạn nhập password" name="password" value="{{ old('password') }}">
            @error('password')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Xác nhận mật khẩu:</label>
            <input type="password" class="form-control" placeholder="Mời bạn nhập lại mật khẩu" name="confirm_password" value="{{ old('confirm_password') }}">
            @error('confirm_password')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Chức vụ:</label>
            <select class="form-select" name="roleValue">
                <option value="" selected disabled>--Vui lòng chọn chức vụ--</option>
                <option value="user" @if (old('roleValue') == "user") {{ 'selected' }} @endif>User</option>
                <option value="admin" @if (old('roleValue') == "admin") {{ 'selected' }} @endif>Admin</option>    
              </select>
            @error('roleValue')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Trạn thái:</label>
            <select class="form-select" name="activeValue">
                <option value="" selected disabled>--Vui lòng chọn trạng thái--</option>
                <option value="0" @if (old('activeValue') == "1") {{ 'selected' }} @endif>Hoạt động</option>
                <option value="1" @if (old('activeValue') == "0") {{ 'selected' }} @endif>Không hoạt động</option>    
              </select>
            @error('activeValue')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
@endsection

@section('js')
@endsection(js)
