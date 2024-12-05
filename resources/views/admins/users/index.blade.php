<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
    <!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
    Danh sách người dùng
@endsection

@section('content')
    @session('message')
        <div class="alert alert-success"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>{{ session('message') }}</div>
    @endsession
    @if ($errors->any())
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            @foreach ($errors->all() as $error)
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>{{ $error }}
            @endforeach
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Stt</th>
                <th scope="col">Username</th>
                <th scope="col">Ảnh đại diện</th>
                <th scope="col">Email</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td scope="row">{{ $user->name }}</td>
                    <td scope="row">
                        <img src="{{ Storage::url($user->avatar) }}" alt="Hình ảnh sản phẩm" width="150px">
                    </td>
                    <td scope="row">{{ $user->email }}</td>
                    <td scope="row">{{ $user->role }}</td>
                    <td scope="row">
                        <form method="POST"
                            action="{{ route('admin/nguoi-dung/cap-nhat-trang-thai', ['id' => $user->id]) }}">
                            @csrf
                            @method('POST')
                            @if ($user->active === 1)
                                <input value="0" name="active" hidden>
                                <button type="submit" class="btn btn-info">Hoạt động</button>
                            @else
                                <input value="1" name="active" hidden>
                                <button type="submit" class="btn btn-secondary">Ngừng hoạt động</button>
                            @endif
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin/nguoi-dung/xoa', ['id' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('admin/nguoi-dung/chinh-sua', ['id' => $user->id]) }}"><button type="button"
                                    class="btn btn-primary">Chỉnh sửa</button></a>
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
