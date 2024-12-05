<?php



use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\ProductController;
use App\Http\Controllers\admins\HomeController AS AdminHomeController;
use App\Http\Controllers\admins\UserController AS AdminUserController;
use App\Http\Controllers\admins\ProductController AS AdminProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route client
    Route::get('/',function(){
        return "Trang chủ";
    });
    //Route Login
    Route::get('/dang-nhap',[AuthController::class,'login'])->name('/dang-nhap');
    Route::post('/dang-nhap',[AuthController::class,'postLogin'])->name('/dang-nhap');
    //Route Register
    Route::get('/dang-ky',[AuthController::class,'register'])->name('/dang-ky');
    Route::post('/dang-ky',[AuthController::class,'postRegister'])->name('/dang-ky');
    // Route đăng xuất
    Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('/dang-xuat');

//Home
Route::get('/',[HomeController::class,'index'])->name('/');


//Trang sản phẩm
Route::get('/san-pham/danh-sach/{category?}',[ProductController::class,'index'])->name('/san-pham/danh-sach');

// Route::post('/san-pham/danh-sach',[ProductController::class,'index'])->name('/san-pham/danh-sach');

Route::get('/san-pham/{id}/chi-tiet',[ProductController::class,'show'])->name('/san-pham/chi-tiet');



// Route admin
Route::middleware('auth',CheckAuth::class)->prefix('/admin')->group(function(){
    //Dashboard
    Route::get('dashboard',[AdminHomeController::class,'index'])->name('/dashboard');

    //Route Products
    Route::prefix('/san-pham')->group(function(){
        Route::get('danh-sach',[AdminProductController::class,'index'])->name('admin/san-pham/danh-sach');
        Route::get('them-moi-san-pham',[AdminProductController::class,'create'])->name('admin/san-pham/them-moi-san-pham');
        Route::post('them-moi',[AdminProductController::class,'store'])->name('admin/san-pham/them-moi');
        Route::get('{id}/chinh-sua',[AdminProductController::class,'edit'])->name('admin/san-pham/chinh-sua');
        Route::put('{id}/cap-nhat',[AdminProductController::class,'update'])->name('admin/san-pham/cap-nhat');
        Route::delete('{id}/xoa',[AdminProductController::class,'destroy'])->name('admin/san-pham/xoa');
    });

    Route::prefix('/nguoi-dung')->group(function(){
        Route::get('danh-sach',[AdminUserController::class,'index'])->name('admin/nguoi-dung/danh-sach');
        Route::get('them-moi-nguoi-dung',[AdminUserController::class,'create'])->name('admin/nguoi-dung/them-moi-nguoi-dung');
        Route::post('them-moi',[AdminUserController::class,'store'])->name('admin/nguoi-dung/them-moi');
        Route::get('{id}/chinh-sua',[AdminUserController::class,'edit'])->name('admin/nguoi-dung/chinh-sua');
        Route::put('{id}/cap-nhat',[AdminUserController::class,'update'])->name('admin/nguoi-dung/cap-nhat');
        Route::delete('{id}/xoa',[AdminUserController::class,'destroy'])->name('admin/nguoi-dung/xoa');
        Route::post('{id}/cap-nhat-trang-thai', [AdminUserController::class, 'updateActive'])->name('admin/nguoi-dung/cap-nhat-trang-thai');
    });
});






