<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ControllerBuoi04;
use App\Http\Controllers\ControllerBuoi06;
use App\Http\Controllers\ControllerBuoi07;
use App\Http\Controllers\ControllerBuoi3;
use App\Http\Controllers\LoaitinController;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\TintucController;
use App\Http\Controllers\UserController;
use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix"=> "Buoi01"], function () {
    Route::get("/B1.B01", function () {
        return view("Buoi01/Bai01");
    })->name('Buoi11');
    Route::get("/B1.B04", function () {
        return view("Buoi01/Bai04");
    })->name('Buoi14');
    Route::get("/B1.B05", function () {
        return view("Buoi01/Bai05");
    })->name('Buoi15');
    Route::get("/B1.B06", function () {
        return view("Buoi01/Bai06");
    })->name('Buoi16');
    Route::get("/B1.B08", function () {
        return view("Buoi01/Bai08");
    })->name('Buoi18');
});
Route::group(['prefix'=> 'Buoi02'], function () {
    Route::get("/B2.B01", function () {
        return view("Buoi02/Bai01");
    });
});
Route::group(["prefix"=> "Buoi03"], function () {
    Route::get("/Bai02/{a?}/{b?}", [ControllerBuoi3::class, "Bai02"])->name("timnghiem");
    Route::get("/Bai04", [ControllerBuoi3::class, "bai04"]);
    Route::post("/Bai04", [ControllerBuoi3::class,"xulybai04"]);
    Route::get("/Bai05", [ControllerBuoi3::class, "bai05"]);
    Route::post("/Bai05", [ControllerBuoi3::class, "xulybai05"]);
    Route::get("/Bai06", [ControllerBuoi3::class, "bai06"]);
    Route::post("/Bai06", [ControllerBuoi3::class, "xulybai06"]);
});
Route::group(['prefix' => 'Buoi04'], function(){
    Route::get('Xemtruyen/{id?}', [ControllerBuoi04::class,'xemtruyen'])->name('truyen');
    Route::get('/', [ControllerBuoi04::class,'xemtruyen'])->name('index');
    Route::get('Xemtruyenngan/{id?}', [ControllerBuoi04::class,'xemtruyenngan'])->name('truyenngan');
});
Route::group(['prefix' => 'Buoi06'], function(){
	Route::get('lietke1', [ControllerBuoi06::class, "TruyVan1"])->name("lietke1");
	Route::get('lietke2', [ControllerBuoi06::class, "TruyVan2"])->name("lietke2");
	//MON HOC
	Route::get("danhsachmonhoc", [ControllerBuoi06::class, "DanhSach_MonHoc"])->name("danhsachmonhoc");
	Route::get('themmonhoc', [ControllerBuoi06::class, "ThemMoi_MonHoc"])->name("themmonhoc");
	Route::post('themmonhoc', [ControllerBuoi06::class, "Xuly_them_mh"])->name("xuly_them_mh");
	Route::get("suamonhoc/{mamh}", [ControllerBuoi06::class, "Sua_MonHoc"])->name("suamonhoc");
	Route::post("suamonhoc/{mamh}", [ControllerBuoi06::class, "xuly_sua_mh"])->name("xuly_sua_mh");
	Route::get("xoamonhoc/{mamh}",[ControllerBuoi06::class, "xuly_xoa_mh"])->name("xuly_xoa_mh");

    //SINH VIEN
	Route::get("danhsachsinhvien", [ControllerBuoi06::class, "DanhSach_SinhVien"])->name("danhsachsinhvien");
    Route::get('themsinhvien', [ControllerBuoi06::class, "ThemMoi_SinhVien"])->name("themsinhvien");
	Route::post('themsinhvien', [ControllerBuoi06::class, "Xuly_them_sv"])->name("xuly_them_sv");
	Route::get("suasinhvien/{masv}", [ControllerBuoi06::class, "Sua_SinhVien"])->name("suasinhvien");
	Route::post("suasinhvien/{masv}", [ControllerBuoi06::class, "xuly_sua_sv"])->name("xuly_sua_sv");
	Route::get("xoasinhvien/{masv}",[ControllerBuoi06::class, "xuly_xoa_sv"])->name("xuly_xoa_sv");

    // LỚP HỌC
    Route::get("danhsachlophoc", [ControllerBuoi06::class, "DanhSach_LopHoc"])->name("danhsachlophoc");
    Route::get('themlophoc', [ControllerBuoi06::class, "ThemMoi_LopHoc"])->name("themlophoc");
	Route::post('themlophoc', [ControllerBuoi06::class, "Xuly_them_lh"])->name("xuly_them_lh");
	Route::get("sualophoc/{malop}", [ControllerBuoi06::class, "Sua_LopHoc"])->name("sualophoc");
	Route::post("sualophoc/{malop}", [ControllerBuoi06::class, "xuly_sua_lh"])->name("xuly_sua_lh");
	Route::get("xoalophoc/{malop}",[ControllerBuoi06::class, "xuly_xoa_lh"])->name("xuly_xoa_lh");
});
Route::group(["prefix"=> "Buoi07"], function () {
    Route::get("", [ControllerBuoi07::class, 'get_lkmonhoc'])->name('lkmh');
});
Route::group(['prefix'=> 'Buoi08'], function () {
    Route::get('abc', [Pagecontroller::class, 'trangchu']);

    Route::get('trangchu', [Pagecontroller::class, 'trangchu'])->name('trangchu');
    Route::get('lienhe', [Pagecontroller::class, 'lienhe'])->name('lienhe');
    Route::get('loaitin/{id}/{TenKhongDau}', [Pagecontroller::class,'loaitin'])->name('loaitin');
    Route::get('tintuc/{id}/{TieuDeKhongDau}', [Pagecontroller::class, 'tintuc'])->name('tintuc');
    Route::get('dangnhap', [Pagecontroller::class, 'get_dangnhap'])->name('dangnhap');
    Route::post('dangnhap', [Pagecontroller::class, 'post_dangnhap'])->name('dangnhap');
    Route::get('dangxuat', [Pagecontroller::class, 'get_dangxuat'])->name('dangxuat');
    Route::get('comment/{id}', [Pagecontroller::class,'comment'])->name('xulycomment');
    Route::get("nguoidung", [PageController::class,"nguoidung"])->name("nguoidung");
    Route::post("nguoidung", [PageController::class,"xulynguoidung"])->name("xulynguoidung");
    Route::get("dangky", [PageController::class,"dangky"])->name('dangky');
    Route::get('dangky', [PageController::class,'xulydangky'])->name('xulydangky');
    Route::get('gioithieu', [PageController::class,'gioithieu'])->name('gioithieu');
    Route::get('timkiem', [PageController::class,'timkiem'])->name('timkiem');
    Route::post('timkiem', [PageController::class,'xulytimkiem'])->name('timkiem');
});
Route::group(['prefix'=> 'admin'], function () {
    Route::group(['prefix'=> 'theloai'], function () {
        Route::get('danhsach', [TheloaiController::class, 'danhsach'])->name('danhsachtl');
        Route::get('sua', [TheloaiController::class, 'sua'])->name('suatl');
        Route::get('them', [TheloaiController::class, 'them'])->name('themtl');
    });
    Route::group(['prefix'=> 'loaitin'], function () {
        Route::get('danhsach', [LoaitinController::class, 'danhsach'])->name('danhsachlt');
        Route::get('sua', [LoaitinController::class, 'sua'])->name('sualt');
        Route::get('them', [LoaitinController::class, 'them'])->name('themlt');
    });
    Route::group(['prefix'=> 'tintuc'], function () {
        Route::get('danhsach', [TintucController::class, 'danhsach'])->name('danhsachtt');
        Route::get('sua', [TintucController::class, 'sua'])->name('suatt');
        Route::get('them', [TintucController::class, 'them'])->name('themtt');
    });
    Route::group(['prefix'=> 'slide'], function () {
        Route::get('danhsach', [SlideController::class, 'danhsach'])->name('danhsachsl');
        Route::get('sua', [SlideController::class, 'sua'])->name('suasl');
        Route::get('them', [SlideController::class, 'them'])->name('themsl');
    });
    Route::group(['prefix'=> 'user'], function () {
        Route::get('danhsach', [UserController::class, 'danhsach'])->name('danhsachus');
        Route::get('sua', [UserController::class, 'sua'])->name('suaus');
        Route::get('them', [UserController::class, 'them'])->name('themus');
    });
});

Route::get("test",function(){
    $bien = Customer::where('id', '=', 14)->get();
    foreach($bien[0]->bills as $cm)
    {
        foreach($cm->bill_deltail as $bill)
        {
            echo $bill; 
        }
    }
});

Route::get("master",function(){
   return view('frontend/layouts/master');
});
Route::get("testl",function(){
    return view('frontend/pages/loai_sanpham');
 });
 Route::get("testchitiet",function(){
    return view('frontend/pages/chitiet_sanpham');
 });
 Route::get("testlienhe",function(){
    return view('frontend/pages/lienhe');
 });
 Route::get("testgioithieu",function(){
    return view('frontend/pages/gioithieu');
 });
 Route::get("testcart",function(){
    return view('frontend/pages/test');
 });
 Route::get("testadmin",function(){
    return view('admin/layouts/masterold');
 });
Route::get("trangchu",[Pagecontroller::class, 'getIndex'])->name('trangchu');
Route::get("lien-he",[Pagecontroller::class, 'getlienhe'])->name('lienhe');
Route::get("gioi-thieu",[Pagecontroller::class, 'getgioithieu'])->name('gioithieu');
Route::get("loai-san-pham/{type}",[Pagecontroller::class, 'getloaisanpham'])->name('loaisanpham');
Route::get("chi-tiet-san-pham/{id}",[Pagecontroller::class, 'getchitietsanpham'])->name('chitietsanpham');
Route::get("them-vao-gio-hang/{id}",[Pagecontroller::class, 'getthemgiohang'])->name('themvaogiohang');
Route::get("xoa-khoi-gio-hang/{id}",[Pagecontroller::class, 'getxoagiohang'])->name('xoakhoigiohang');
Route::get("increase/{id}",[Pagecontroller::class, 'increase'])->name('increase');
Route::get("decrease/{id}",[Pagecontroller::class, 'decrease'])->name('decrease');
Route::get("dat-hang",[Pagecontroller::class, 'getdathang'])->name("thanhtoan");
Route::post("dat-hang",[Pagecontroller::class, 'postdathang']);
Route::get("dang-nhap",[Pagecontroller::class, 'getdangnhap'])->name('dangnhap');
Route::get("dang-ky",[Pagecontroller::class, 'getdangky'])->name('dangky');
Route::post("dang-ky",[Pagecontroller::class, 'postdangky']);
Route::get("dang-nhap",[Pagecontroller::class, 'getdangnhap'])->name('dangnhap');
Route::post("dang-nhap",[Pagecontroller::class, 'postdangnhap']);
Route::get("dang-xuat",[Pagecontroller::class, 'getdangxuat'])->name('dangxuat');
Route::get("tim-kiem",[Pagecontroller::class, 'gettimkiem'])->name('timkiem');

//admin
Route::get('dang-nhap-admin',[Admincontroller::class,'getdangnhapadmin'])->name('dangnhapadmin');
Route::post('dang-nhap-admin',[Admincontroller::class,'postdangnhapadmin']);
Route::get('dang-xuat-admin',[Admincontroller::class,'getdangxuat'])->name('dangxuatadmin');

Route::group(['prefix'=> 'admin','middleware' => 'Adminlogin'], function () {
  Route::group(['prefix'=> 'user'], function () {
    Route::get('thong-tin-admin',[Admincontroller::class,'getthongtin'])->name('thongtin');
    });

    Route::group(['prefix'=> 'loaisanpham'], function () {
        Route::get('danh-sach-phan-loai',[Admincontroller::class,'productstype'])->name('danhsachloai');
        Route::get('themloaisanpham',[Admincontroller::class,'getproducttypes'])->name('themloaisanpham');
        Route::post('themloaisanpham',[Admincontroller::class,'addtypeproduct']);
        Route::get('sualoaisanpham/{id}',[Admincontroller::class,'geteditproducttype'])->name('sualoaisanpham');
        Route::post('sualoaisanpham/{id}',[Admincontroller::class,'editproducttype']);
        Route::get('xoasanpham/{id}',[Admincontroller::class,'deleteproducttype'])->name('xoasanpham');
        });
    Route::group(['prefix'=> 'sanpham'], function () {
        Route::get('danh-sach-san-pham',[Admincontroller::class,'getproducts'])->name('danhsachsanpham');
        Route::get('themsanpham',[Admincontroller::class,'getthemsanpham'])->name('themsanpham');
        Route::post('themsanpham',[Admincontroller::class,'addproducts']);
        Route::get('suasanpham/{id}',[Admincontroller::class,'geteditproducts'])->name('suasanpham');
        Route::post('suasanpham/{id}',[Admincontroller::class,'posteditproducts']);
        Route::get('xoasanpham/{id}',[Admincontroller::class,'deleteproducts'])->name('xoaproducts');
        });
    Route::group(['prefix'=> 'customer'], function () {
        Route::get('danh-sach-khach-hang',[Admincontroller::class,'getkhachhang'])->name('danhsachkhachhang');
        Route::get('xoa/{id}',[Admincontroller::class,'xoakhachhang'])->name('xoakhachhang');
        });
    Route::group(['prefix'=> 'user'], function () {
        Route::get('danh-sach-nguoi-dung',[Admincontroller::class,'getuser'])->name('danhsachnguoidung');
        Route::get('themnguoidung',[Admincontroller::class,'getadduser'])->name('themnguoidung');
        Route::post('themnguoidung',[Admincontroller::class,'postadduser']);
        Route::get('suanguoidung/{id}',[Admincontroller::class,'getedituser'])->name('suanguoidung');
        Route::post('suanguoidung/{id}',[Admincontroller::class,'postedituser']);
        Route::get('xoanguoidung/{id}',[Admincontroller::class,'deleteuser'])->name('xoanguoidung');
        });
    Route::group(['prefix'=> 'bills'], function () {
        Route::get('danh-sach-don-hang',[Admincontroller::class,'getbills'])->name('danhsachdon');
        Route::get('capnhatdonhang/{id}',[Admincontroller::class,'geteditbill'])->name('capnhatdonhang');
        Route::post('capnhatdonhang/{id}',[Admincontroller::class,'posteditbill']);
        });

});
