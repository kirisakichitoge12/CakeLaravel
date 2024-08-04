<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerBuoi03 extends Controller
{
   public function chaoban()
   {
      $ten="Bách khoa";
      $nam=2023;
      return view("buoi3/chaoban",compact("ten","nam"));
   }
   public function hinhcn($cr=null,$cd=null)
   {
        if($cr==null ||$cd==null)
        {
            return view("buoi3/bai1");
        }
        else
        {
            $cv=($cr+$cd)*2;
            $dt=$cr*$cd;
            return view("buoi3/bai1",compact("cv","dt"));
        }
   }
   public function xuligiaitoan($a=null,$b=null)
   {
    if($a==null ||$b==null)
    {
        return view("buoi3/bai2");
    }
    else
    {
       if($a==0 && $b ==0)
       {
            $kq="Phương trình vô số nghiệm";
            return view("buoi3/bai2",compact("kq"));
       }
       else if($a==0 &&$b!=0)
       {
        $kq="Phương trình vô nghiệm";
         return view("buoi3/bai2",compact("kq"));
       }
       else if($a!=0)
       {
        $kq=-$b/$a;
        return view("buoi3/bai2",compact("kq"));
       }
    } 
   }
   public function xulitinhluong(Request $rs)
   {
      $ln=$rs["luongngay"];
      $nc=$rs["ngaycong"];
      $tl=$ln*$nc;
      if($tl==null)
      {
        return view("buoi3/bai3");
      }
      else
      {
        return view("buoi3/bai3",compact("ln","nc","tl"));
      }
   }
   public function hinhtron(Request $rs)
   {
      $bk=$rs["bankinh"];
      $dt=$bk*$bk*3.14;
      $cv=2*3.14;
      if($cv==null)
      {
        return view("buoi3/bai3");
      }
      else
      {
        return view("buoi3/bai3",compact("bk","cv","dt"));
      }
   }
}
