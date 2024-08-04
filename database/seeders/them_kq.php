<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class them_kq extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dskhoa= [
            ["mamh" => 1, "lanthi" =>1,"masv"=>1,"diemthi"=>2],
            ["mamh" => 1, "lanthi" =>1,"masv"=>2,"diemthi"=>3],
            ["mamh" => 2, "lanthi" =>1,"masv"=>3,"diemthi"=>4],
            ["mamh" => 3, "lanthi" =>1,"masv"=>4,"diemthi"=>5],
            ["mamh" => 4, "lanthi" =>1,"masv"=>5,"diemthi"=>5],
            ["mamh" => 2, "lanthi" =>1,"masv"=>6,"diemthi"=>6],
            ["mamh" => 2, "lanthi" =>1,"masv"=>7,"diemthi"=>7],
          
        ];
        try {
            foreach($dskhoa as $dbkhoa)
            {
                DB::table("ketqua")->insert($dbkhoa);
            }
        }
        catch(\Throwable $th)
        {
            echo "Lỗi:Không thêm được $th";
        }
    }
}
