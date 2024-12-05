<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
    <!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
    Chỉnh sửa người dùng
@endsection

@section('content')
    @session('message')
        <div class="alert alert-success"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>{{ session('message') }}</div>
    @endsession
    <form method="POST" action="{{ route('admin/nguoi-dung/cap-nhat', ['id' => $user->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3">
            <label class="form-label">Username:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập username" name="name" value="{{ old('name') ? old('name') : $user->name }}">
            @error('name')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh đại diện:</label>
            <img src="{{ Storage::url($user->avatar) }}" alt="Hình ảnh sản phẩm" width="150px">
            <input type="file" class="form-control" placeholder="Mời bạn nhập ảnh đại diện" name="avatar" value="{{ old('avatar') ? old('avatar') : $user->avatar }}">
            @error('avatar')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="text" class="form-control" placeholder="Mời bạn nhập email" name="email" value="{{ old('email') ? old('email') : $user->email }}">
            @error('email')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Chức vụ:</label>
            <select class="form-select" name="roleValue">
                <option value="" selected disabled>--Vui lòng chọn chức vụ--</option>
                <option value="user" @if (old('roleValue') == 'user' || $user->role == 'user') selected @endif>User</option>
                <option value="admin" @if (old('roleValue') == 'admin' || $user->role == 'admin') selected @endif>Admin</option>    
              </select>
            @error('roleValue')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái:</label>
            <select class="form-select" name="activeValue">
                <option value="" selected disabled>--Vui lòng chọn trạng thái--</option>
                <option value="1" @if ($user->active) selected @endif>Hoạt động</option>
                <option value="0" @if (!$user->active) selected @endif>Không hoạt động</option>    
              </select>
            @error('activeValue')
                <span class="text-danger"><svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
@endsection

@section('js')
@endsection(js)
