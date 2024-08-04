<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerBuoi3 extends Controller
{
    public function Bai02($a = null, $b = null)
    {
        if ($a != null && $b != null) {
            if ($a == 0) {
                if ($b == 0) {
                    $x = "Vo nghiem";
                } else {
                    $x = "Voi moi x thuoc R";
                }
            } else {
                $x = -$b / $a;
            }
            return view("Buoi03/Bai02", compact("x"));
        } else return View("Buoi03/Bai02");
    }
    public function bai04()
    {
        return view("Buoi03/Bai04");
    }
    public function xulybai04(request $form)
    {
        $bk = $form["bk"];
        $cv = 2 * $bk * pi();
        $dt = pi() * $bk * $bk;
        return View("Buoi03/Bai04", compact("cv", "dt", "bk"));
    }
    public function bai06()
    {
        return view("Buoi03/Bai06");
    }
    public function xulybai06(request $form)
    {
        $a = $form["a"];
        $b = $form["b"];
        if ($a != 0 && $b != 0) {
            $x = -$b / $a;
        } elseif ($a == 0 && $b == 0) {
            $x = 'vo nghiem';
        } else {
            $x = 'voi moi x thuoc R';
        }
        return View("Buoi03/Bai06", compact("x", "a", "b"));
    }
    public function bai05()
    {
        return view("Buoi03/Bai05");
    }
    public function xulybai05(request $form)
    {
        $tch = $form["tch"];
        $csc = $form["csc"];
        $csm = $form["csm"];
        $dg = $form["dg"];
        $td = ($csm - $csc) * $dg;
        return View("Buoi03/Bai05", compact("td", "csc", "csm", "dg", "tch"));
    }
}
