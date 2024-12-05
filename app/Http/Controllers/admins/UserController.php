<?php

namespace App\Http\Controllers\admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admins.users.index', compact('users'));
    }

    public function create()
    {
        return view('admins.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('images/users/avatars');
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => $path_image,
            'role' => $request->roleValue,
            'active' => $request->activeValue,
        ];
        User::create($data);
        session()->flash('message', 'Đăng ký thành công!');
        return redirect()->route('admin/nguoi-dung/danh-sach');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admins.users.edit', compact('user'));
    }

    public function update(EditUserRequest $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('images/users/avatars');
            // Xóa ảnh cũ nếu có
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $path_image ?? $user->avatar,
            'role' => $request->roleValue,
            'active' => $request->activeValue,
        ];

        User::where('id', $request->id)
            ->update($data);
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $auth = auth()->user();
        if ($auth->id === (int)$id) {
            return back()->withErrors(['message' => "Bạn không thể tự xóa chính mình"]);
        } else {
            $user = User::find($id);
            // Xóa poster
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }

            User::where('id', $id)
                ->delete();
            return redirect()->route('admin/nguoi-dung/danh-sach');
        }
    }

    public function updateActive(Request $request, $id)
    {
        $active = $request->active;
        User::where('id', $id)
            ->update(['active' => $active]);
        session()->flash('message', 'Cập nhật thành công!');
        return redirect()->route('admin/nguoi-dung/danh-sach');
    }
}
