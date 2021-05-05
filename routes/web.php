<?php
use App\Http\Controllers\c;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\LoaisanphamController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','middleware'=>'mdw'],function (){
    
    Route::get('/thongke',[c::class,'thongke'])->name('thongke');
    
    Route::get('/khachhang',[c::class,'khachhang'])->name('khachhang');
    Route::get('/xoakhachhang/{id}',[c::class,'xoakhachhang'])->name('xoakhachhang');

    Route::get('/xacnhanstatus/{id}',[c::class,'xacnhanstatus'])->name('xacnhanstatus');

    
    Route::get('/donhang',[c::class,'donhang'])->name('donhang');
    Route::get('/xoadonhang/{iddh}/{idkh}',[c::class,'xoadonhang']);

    Route::resource('slider',SliderController::class)->only('index','destroy','store');
    Route::resource('loaisanpham',LoaisanphamController::class);
    Route::resource('sanpham',SanphamController::class);

    Route::get('/users',[c::class,'danhsachsanpham'])->name('users');
    Route::get('/admin',[AdminController::class,'admin'])->name('admin');
    Route::post('/doimatkhau',[AdminController::class,'doimatkhau'])->name('doimatkhau');
    Route::post('/doiten',[AdminController::class,'doiten'])->name('doiten');

    Route::post('timkiem',[c::class,'timkiem']);

    Route::get('/logout_admin',[AdminController::class,'logout_admin']);
});
Route::get('/',[c::class,'trangchu']);
Route::get('/gioithieu',function(){return view('home.gioithieu');});
Route::get('/chitietsanpham/{id}/{maloai}',[c::class,'chitietsanpham']);
Route::post('xulydonhang',[c::class,'xulydonhang']);
Route::get('xulydonhang',[c::class,'xulydonhang']);
  
Route::get('/giohang',[c::class,'cart']);
Route::get('/themvaogiohang/{id}',[c::class,'addToCart']);
Route::get('/xoa/{id}',[c::class,'xoahang'])->name('xoa');
Route::get('/tangsoluong/{rowid}',[c::class,'tangsoluong'])->name('tangsoluong');
Route::get('/giamsoluong/{rowid}',[c::class,'giamsoluong'])->name('giamsoluong');


Route::get('/dathang',[c::class,'dathang'])->middleware('checkloginuser');
Route::get('/l',function(){ echo bcrypt('999');});

Route::get('/profile_user',[UserController::class,'profile_user'])->middleware('MDW_profile_user');
Route::get('/logout_user',[UserController::class,'logout_user']);
Route::get('/login_user',[UserController::class,'login_user'])->middleware('MDW_login_user');
Route::post('/xuly_register_user',[UserController::class,'xuly_register_user']);
Route::get('/register_user',[UserController::class,'register_user']);
Route::post('/xuly_login_user',[UserController::class,'xuly_login_user']);

Route::post('/xuly_login_admin',[AdminController::class,'xuly_login_admin']);
Route::get('/login_admin',[AdminController::class,'login_admin'])->middleware('MDW_login_admin');
Route::post('/loc',[c::class,'loc']);

Route::view('/paypal_thanhcong','home.paypal_thanhcong');
Route::view('/paypal_loi','home.paypal_loi');
Route::get('/paypal_thanhtoan',[c::class,'paypal_thanhtoan']);
Route::post('/change_info_user',[UserController::class,'change_info_user']);

