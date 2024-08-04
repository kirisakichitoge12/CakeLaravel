<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Buoi03Controller extends Controller
{
    public function ChaoBan()
    {
        $hoten = "Bách Khoa";
        $nam = 2023;
        return view("Buoi03/chaoban", compact("hoten", "nam"));
    } 

    public function tinhluong()
    {
        return view("Buoi02/tinhluong");
    }

    public function xulytinhluong(Request $frm)
    {
        $nc = $frm["ngaycong"];
        $lg = $frm["luongngay"];
        $lt = $nc *$lg;

        return view("Buoi02/tinhluong", compact("nc", "lg", "lt"));
    }

    public function HinhChuNhat($cd=null, $cr=null)
    {
        if ($cd!=null && $cr!=null)
        {
            $cv = ($cd + $cr) * 2;
            $dt = ($cd * $cr);
            return view("Buoi03/BaiTap01", compact("cv", "dt"));
        }
        else
            return view("Buoi03/BaiTap01");
    }
}
