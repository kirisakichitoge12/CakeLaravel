<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class them_sinhvien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dssinhvien = [
            ["masv" => 1, "hosv" => "Nguyễn Thị" ,"ten"=>"Hải","phai"=>"Nữ","ngaysinh"=>"1979-03-03","noisinh"=>"Sài Gòn","diachi"=>"12 Võ Văn Tần q3","malop"=>1,"hocbong"=>"100000","hinh"=>""],
            ["masv" => 2, "hosv" => "Trần Văn" ,"ten"=>"Chính","phai"=>"Nam","ngaysinh"=>"1980-12-24","noisinh"=>"Sài Gòn","diachi"=>"3 Nguyễn Bỉnh Khiêm q1","malop"=>2,"hocbong"=>"200000","hinh"=>""],
            ["masv" => 3, "hosv" => "Lê Thi Bạch" ,"ten"=>"Yến","phai"=>"Nữ","ngaysinh"=>" 1981-02-20","noisinh"=>"Hà Nội","diachi"=>"75 Pastuer Quận 3","malop"=>3,"hocbong"=>"300000","hinh"=>""],
            ["masv" => 4, "hosv" => "Trần Thị Thu  ","ten"=>"Thủy","phai"=>"Nữ","ngaysinh"=>"1982-02-10","noisinh"=>"Hà Nội","diachi"=>"75 Pastuer Quận 3","malop"=>4,"hocbong"=>"400000","hinh"=>""],
            ["masv" => 5, "hosv" => "Trần Thanh  ","ten"=>"Mai","phai"=>"nam","ngaysinh"=>"1990-05-17","noisinh"=>"Hà Nội","diachi"=>"75 Pastuer Quận 3","malop"=>5,"hocbong"=>"500000","hinh"=>""],
            ["masv" => 6, "hosv" => "Trần Văn ","ten"=>"Tèo","phai"=>"nam","ngaysinh"=>"1990-05-17","noisinh"=>"Hà Nội","diachi"=>"75 Pastuer Quận 3","malop"=>6,"hocbong"=>"500000","hinh"=>""],
        ];  
        try {
            foreach($dssinhvien as $sv)
            {
                DB::table("sinhvien")->insert($sv);
            }
        }
        catch(\Throwable $th)
        { 
            echo "Lỗi:Không thêm được $th";
        }
    }
}
