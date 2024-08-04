<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class them_monhoc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dsmonhoc = [
            ["tenmh" => "Trí Tuệ Nhân Tạo", "sotinchi" => 4],
            ["tenmh" => "Truyền Tin", "sotinchi" => 4],
            ["tenmh" => "Đồ Họa", "sotinchi" => 8],
            ["tenmh" => "Văn Phạm", "sotinchi" => 7],
            ["tenmh" => "Đàm Thoại", "sotinchi" => 5],
            ["tenmh" => "Vật Lý Nguyên Tử", "sotinchi" => 4],
            ["tenmh" => "Vật Lý Đại Cương", "sotinchi" => 4],
            ["tenmh" => "Triết Học", "sotinchi" => 6],
            ["tenmh" => "Toán Đại Cương", "sotinchi" => 4],
        ];
        try {
            foreach($dsmonhoc as $mh)
            {
                DB::table("monhoc")->insert($mh);
            }
        }
        catch(\Throwable $th)
        {
            echo "Lỗi:Không thêm được $th";
        }
    }
}
