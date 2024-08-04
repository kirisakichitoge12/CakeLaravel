<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ControllerBuoi06 extends Controller
{
    public function TruyVan1()
    {
        //Cách 01
        $dsmh_c1 = DB::table("sinhvien")->join("lophoc", "sinhvien.malop", "=", "lophoc.malop")->select("masv", "hosv", "tensv", "tenlop")->get();

        //cách 02
        $dsmh_c2 = DB::select("select masv, hosv, tensv, tenlop from sinhvien inner join lophoc on sinhvien.malop=lophoc.malop ");

        return View("Buoi06/truyvan1", compact("dsmh_c1", "dsmh_c2"));
    }
    public function TruyVan2()
    {
        //Cách 01
        $dssv_c1 = DB::table("sinhvien")->select("masv", "hosv", "tensv", "phai")->get();

        //cách 02
        $dssv_c2 = DB::select("select masv, hosv, tensv, phai from sinhvien");

        return View("Buoi06/truyvan2", compact("dssv_c1", "dssv_c2"));
    }
    //MON HOC
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
        ], [
            "tenmh.required" => "Bạn chưa nhập tên môn học",
            "sotinchi.required"    => "bạn chưa nhập số tín chỉ",
            "sotinchi.numeric"     => "Số tín chỉ phải nhập số"
        ]);
        $ten = $val["tenmh"];
        $stc = $val["sotinchi"];
        DB::table("monhoc")->insert(["tenmh" => "$ten", "sotinchi" => $stc]);
        //DB::insert("insert into monhoc(tenmh, sotinchi) values('$ten', $stc)");
        return back()->with(["tb" => "Thêm Môn Học Thành Công"]);
    }
    public function sua_monhoc($mamh)
    {
        $monhoc = DB::select("select * from monhoc where mamh=$mamh");
        return view("Buoi06/suamonhoc", compact("monhoc"));
    }
    public function xuly_sua_mh(Request $req, $mamh)
    {
        $val = $req->validate([
            "tenmh" => "required",
            "sotinchi" => "required|numeric"
        ], [
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
    //SINH VIEN
    public function DanhSach_SinhVien()
    {
        $dssv = DB::select("select * from sinhvien");
        return view("Buoi06/danhsachsinhvien", compact("dssv"));
    }
    public function ThemMoi_SinhVien()
    {
        $dslh = DB::select("select malop, tenlop from lophoc");
        return view("Buoi06/themsinhvien", compact("dslh"));
    }
    public function Xuly_them_sv(Request $req)
    {
        $val = $req->validate([
            "hosv" => "required",
            "tensv" => "required",
            "noisinh" => "required",
            "diachi" => "required",
            "hocbong" => "required|numeric"
        ], [
            "hosv.required" => "Bạn chưa nhập",
            "tensv.required" => "Bạn chưa nhập",
            "noisinh.required" => "Bạn chưa nhập",
            "diachi.required" => "Bạn chưa nhập",
            "hocbong.required" => "Bạn chưa nhập",
            "hocbong.numeric" => "Học bổng phải nhập số",
        ]);
        $ho = $val["hosv"];
        $ten = $val["tensv"];
        $gt = $req["gioitinh"];
        $ngs = $req["ngaysinh"];
        $ns = $val["noisinh"];
        $dc = $val["diachi"];
        $ml = $req["malop"];
        $hb = $val["hocbong"];
        $hinh = "sinhvien.jpg";
        DB::table("sinhvien")->insert(["hosv" => "$ho", "tensv" => "$ten", "phai" => "$gt", "ngaysinh" => "$ngs", "noisinh" => "$ns", "diachi" => "$dc", "malop" => $ml, "hocbong" => $hb, "hinh" => "$hinh"]);
        //DB::insert("insert into monhoc(tenmh, sotinchi) values('$ten', $stc)");
        return back()->with(["tb" => "Thêm Sinh Viên Thành Công"]);
    }
    public function sua_sinhvien($masv)
    {
        // $sinhvien = DB::select("select * from sinhvien where masv=$masv");
        $sinhvien = DB::select("select * from sinhvien where masv=$masv");
        $dslh = DB::select("select malop, tenlop from lophoc");
        return view("Buoi06/suasinhvien", compact("sinhvien", "dslh"));
    }
    public function xuly_sua_sv(Request $req, $masv)
    {
        $ho = $req["hosv"];
        $ten = $req["tensv"];
        $gt = $req["gioitinh"];
        $ngs = $req["ngaysinh"];
        $ns = $req["noisinh"];
        $dc = $req["diachi"];
        $ml = $req["malop"];
        $hb = $req["hocbong"];
        $hinh = "sinhvien.jpg";
        DB::update("update sinhvien set hosv='$ho', tensv = '$ten', phai = '$gt', ngaysinh = '$ngs', noisinh = '$ns', diachi = '$dc', malop = '$ml', hocbong = '$hb' where masv = $masv");
        return back()->with(["tb" => "Cập nhật thành công"]);
    }
    public function xuly_xoa_sv($masv)
    {
        DB::delete("delete from sinhvien where masv=$masv");
        return back()->with(["tb" => "Xóa sinh viên thành công"]);
    }
    //LỚP HỌC
    public function DanhSach_LopHoc()
    {
        $dslh = DB::select("select malop, tenlop, tenkhoa, gvcn, siso, hocphi from lophoc inner join khoa on lophoc.makhoa=khoa.makhoa ");
        return view("Buoi06/danhsachlophoc", compact("dslh"));
    }
    public function ThemMoi_LopHoc()
    {
        $dsk = DB::select("select makhoa, tenkhoa from khoa");
        return view("Buoi06/themlophoc", compact("dsk"));
    }
    public function Xuly_them_lh(Request $req)
    {
        $ten = $req["tenlh"];
        $makhoa = $req["makhoa"];
        $gvcn = $req["gvcn"];
        $ss = $req["siso"];
        $hp = $req["hocphi"];
        DB::table("lophoc")->insert(["tenlop" => "$ten", "makhoa" => $makhoa, "gvcn" => "$gvcn", "siso" => "$ss", "hocphi" => "$hp"]);
        //DB::insert("insert into monhoc(tenmh, sotinchi) values('$ten', $stc)");
        return back()->with(["tb" => "Thêm Lớp Học Thành Công"]);
    }
    public function sua_lophoc($malop)
    {
        $dsk = DB::select("select makhoa, tenkhoa from khoa");
        $lophoc = DB::select("select * from lophoc where malop=$malop");
        return view("Buoi06/sualophoc", compact("lophoc", "dsk"));
    }
    public function xuly_sua_lh(Request $req, $malop)
    {
        $ten = $req["tenlh"];
        $makhoa = $req["makhoa"];
        $gvcn = $req["gvcn"];
        $ss = $req["siso"];
        $hp = $req["hocphi"];
        DB::update("update lophoc set tenlop = '$ten', makhoa = '$makhoa', gvcn = '$gvcn', siso = '$ss', hocphi = '$hp' where malop = $malop");
        return back()->with(["tb" => "cập Nhật thành công"]);
    }
    public function xuly_xoa_lh($malop)
    {
        DB::delete("delete from lophoc where malop=$malop");
        return back()->with(["tb" => "Xóa lớp học thành công"]);
    }
}
