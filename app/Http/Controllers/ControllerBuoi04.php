<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerBuoi04 extends Controller{
    public function xemtruyen($id=null){
        switch($id)
        {
            case 1: return view("Buoi04/truyen01"); 
            case 2: return view("Buoi04/truyen02"); 
            case 3: return view("Buoi04/truyen03");
            default:
                    return view("Buoi04/index");
        }
    }
    public function xemtruyenngan($id=null){
        switch($id)
        {
            case 1: return view("Buoi04/truyenngan01"); 
            case 2: return view("Buoi04/truyenngan02"); 
            case 3: return view("Buoi04/truyenngan03");
        }
    }
}
