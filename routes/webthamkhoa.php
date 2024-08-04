<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Buoi03Controller;
use App\Http\Controllers\Buoi04Controller;
use App\Http\Controllers\Buoi05Controller;
use App\Http\Controllers\Buoi06Controller;

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

Route::group(['prefix' => 'Buoi01'], function(){
	Route::get('/', function () {
		return view('welcome');
	});
	
	Route::get('/chao/{nam?}/{hoten?}', function($nam=null, $hoten=null){
		
		return "$hoten chào các bạn, năm $nam là năm tốt";
	})->name("chaoban");
	
	Route::get('/xemtho', function(){
		return view('Buoi01/thoquehuong');
	});
	
	Route::get('/thome', function(){
		return view("thome");
	})->name("xemthome");
	
	Route::get("/vidu01", function(){
		return view("Buoi02/vidu01");
	});
	
	Route::post("/dangkytb", function(){
		return "Dang Ky thanh cong";
	})->name("dangky");

});

Route::group(['prefix' => "Buoi02"], function(){
	Route::get('tinhluong', function(){
		return view("Buoi02/tinhluong");
	});

	Route::post('tinhluong', function(Request $abc){
		$nc = $abc["ngaycong"];
		$lg = $abc["luongngay"];
		$lt = $nc * $lg;
		return view("Buoi02/tinhluong", compact("lt","nc", "lg"));
	});

	Route::get('tl02', function(){
		return view("Buoi02/tl02");
	});

	Route::post('tl02', function(Request $req){
		$nc = $req["ngaycong"];
		$lg = $req["luongngay"];
		$lt = $nc*$lg;
		return view("Buoi02/tl02", compact("nc", "lg","lt"));
	});

});

Route::group(['prefix' => "Buoi03"], function(){
	Route::get("/ChaoBan",[Buoi03Controller::class,"ChaoBan"]);
	Route::get("/tinhluong", [Buoi03Controller::class,"tinhluong"]);
	Route::post("/tinhluong", [Buoi03Controller::class,"xulytinhluong"]);

	Route::get('/HinhChuNhat/{cd?}/{cr?}',[Buoi03Controller::class, "HinhChuNhat"])->name("hcn1");
	
});

Route::group(['prefix' => 'Buoi04'], function(){

	Route::get('/tonghaiso', [Buoi04Controller::class, "tong"]);
	Route::post('/tonghaiso', [Buoi04Controller::class, "tinhtong"]);

	Route::get('/tong2so', [Buoi04Controller::class, "tongmoi"]);
	Route::post('/tong2so', [Buoi04Controller::class, "tinhtongmoi"]);

	Route::get('/danghinh', [Buoi04Controller::class, "DangHinh"]);
	Route::post('/danghinh', [Buoi04Controller::class, "XuLyDangHinh"]);

	Route::get("/xemtruyen01", [Buoi04Controller::class, "xemtruyen01"])->name("t01");
	Route::get("/xemtruyen02", [Buoi04Controller::class, "xemtruyen02"])->name("t02");

	Route::get("Xemtruyen/{id?}", [Buoi04Controller::class, "xemtruyen"])->name("truyen");
	Route::get("/", [Buoi04Controller::class, "xemtruyen"])->name("index");
});

Route::group(['prefix' => 'Buoi05'], function(){
	Route::get('lietkemonhoc', [Buoi05Controller::class, "getDanhSachMonHoc"]);
	Route::get('danhsachmonhoc', [Buoi05Controller::class, "LietKeMonHoc"]);
});

Route::group(['prefix' => 'Buoi06'], function(){
	Route::get('lietke1', [Buoi06Controller::class, "TruyVan1"])->name("lietke1");
	Route::get('lietke2', [Buoi06Controller::class, "TruyVan2"])->name("lietke2");
	
	Route::get("danhsachmonhoc", [Buoi06Controller::class, "DanhSach_MonHoc"])->name("danhsachmonhoc");
	Route::get('themmonhoc', [Buoi06Controller::class, "ThemMoi_MonHoc"])->name("themmonhoc");
	Route::post('themmonhoc', [Buoi06Controller::class, "Xuly_them_mh"])->name("xuly_them_mh");
	Route::get("suamonhoc/{mamh}", [Buoi06Controller::class, "Sua_MonHoc"])->name("suamonhoc");
	Route::post("suamonhoc/{mamh}", [Buoi06Controller::class, "xuly_sua_mh"])->name("xuly_sua_mh");
	Route::get("xoamonhoc/{mamh}",[Buoi06Controller::class, "xuly_xoa_mh"])->name("xuly_xoa_mh");

});

