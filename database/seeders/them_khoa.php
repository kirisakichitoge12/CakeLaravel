<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class them_khoa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dskhoa= [
            ["makhoa" => 1, "tenkhoa" => "Công nghệ thông tin"],
            ["makhoa" => 2, "tenkhoa" => "Đại cương"],
            ["makhoa" => 3, "tenkhoa" => "Quan hệ hợp tác quốc tế"],
            ["makhoa" => 4, "tenkhoa" => "Cơ khí"],
          
        ];
        try {
            foreach($dskhoa as $dbkhoa)
            {
                DB::table("khoa")->insert($dbkhoa);
            }
        }
        catch(\Throwable $th)
        {
            echo "Lỗi:Không thêm được $th";
        }
    }
}
