<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class them_lophoc extends Seeder
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
            ["malop" => 1, "tenlop" => "Cao đẳng công nghệ thông tin A ","makhoa" => 1, "gvcn" => "Nguyễn Hoài Nam ", "siso" => "100", "hocphi" => "800000"],
            ["malop" => 2, "tenlop" => "Cao đẳng tin học B ","makhoa" => 1, "gvcn" => "Trần Thị Bích Nga ", "siso" => "80", "hocphi" => "800000"],
            ["malop" => 3, "tenlop" => "Cao đẳng cơ khí A ","makhoa" => 4, "gvcn" => "Hồ Văn Chung", "siso" => "120", "hocphi" => "950000"],
            ["malop" => 4, "tenlop" => "Cao đẳng cơ khí B ","makhoa" => 4, "gvcn" => "Nguyễn Quốc Thắng", "siso" => "100", "hocphi" => "900000"],

          
        ];
        try {
            foreach($dskhoa as $dbkhoa)
            {
                DB::table("lophoc")->insert($dbkhoa);
            }
        }
        catch(\Throwable $th)
        {
            echo "Lỗi:Không thêm được $th";
        }
    }
}
