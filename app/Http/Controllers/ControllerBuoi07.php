<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;

class ControllerBuoi07 extends Controller
{
    public function get_lkmonhoc()
        {
        $dsmh = MonHoc::all();
        return view("buoi07.danhsachmonhoc", compact('dsmh'));
        }
}
