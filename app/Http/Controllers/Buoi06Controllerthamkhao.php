<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Buoi06Controller extends Controller
{
    public function TruyVan1()
    {
        //Cách 01
        $dsmh_c1 = DB::table("sinhvien")->join("lophoc","sinhvien.malop", "=", "lophoc.malop")->select("masv", "hosv", "tensv", "tenlop")->get();
        
        //cách 02
        $dsmh_c2 = DB::select("select masv, hosv, tensv, tenlop from sinhvien inner join lophoc on sinhvien.malop=lophoc.malop ");

        return View("Buoi06/truyvan1", compact("dsmh_c1","dsmh_c2"));
    }
    public function TruyVan2()
    {
        //Cách 01
        $dssv_c1 = DB::table("sinhvien")->select("masv","hosv", "tensv", "phai")->get();
        
        //cách 02
        $dssv_c2 = DB::select("select masv, hosv, tensv, phai from sinhvien");

        return View("Buoi06/truyvan2", compact("dssv_c1","dssv_c2"));
    }

    public function DanhSach_MonHoc()
    {
        $dsmh = DB::select("select * from monhoc");
        return view("Buoi06/danhsachmonhoc", compact("dsmh"));
    }
    public function ThemMoi_MonHoc()
    {
        return view("Buoi06/themmonhoc");
    }

    public function Xuly_them_mh(Request $req)
    {
        $val = $req->validate([
            "tenmh" => "required",
            "sotinchi" => "required|numeric"
        ],[
            "tenmh.required" => "Bạn chưa nhập tên môn học",
            "sotinchi.required"    => "bạn chưa nhập số tín chỉ",
            "sotinchi.numeric"     => "Số tín chỉ phải nhập số"
        ]);
        $ten = $val["tenmh"];
        $stc = $val["sotinchi"];
        DB::table("monhoc")->insert(["tenmh" => "$ten", "sotinchi" => $stc]);
        //DB::insert("insert into monhoc(tenmh, sotinchi) values('$ten', $stc)");
        return back()->with(["tb" => "Thêm Mơn Học Thành Công"]);
    }

    public function sua_monhoc($mamh)
    {
        $monhoc = DB::select("select * from monhoc where mamh=$mamh");
        return view("Buoi06/suamonhoc",compact("monhoc"));
    }
    public function xuly_sua_mh(Request $req, $mamh)
    {
        $val = $req->validate([
            "tenmh" => "required",
            "sotinchi" => "required|numeric"
        ],[
            "tenmh.required" => "Bạn chưa nhập tên môn học",
            "sotinchi.required"    => "bạn chưa nhập số tín chỉ",
            "sotinchi.numeric"     => "Số tín chỉ phải nhập số"
        ]);
        $ten = $val["tenmh"];
        $stc = $val["sotinchi"];
        DB::update("update monhoc set tenmh='$ten', sotinchi = $stc where mamh = $mamh");
        return back()->with(["tb" => "cập Nhật thành công"]);
    }

    public function xuly_xoa_mh($mamh)
    {
        DB::delete("delete from monhoc where mamh=$mamh");
        return back()->with(["tb" => "Xóa môn học thành công"]);
    }
}
