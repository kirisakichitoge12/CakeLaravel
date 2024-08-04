<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable("sinhvien"))
        {
            Schema::create("sinhvien", function(Blueprint $table){
                $table->increments("masv");
                $table->string("hosv", 30);
                $table->string("ten", 10);
                $table->string("phai", 3);
                $table->dateTime("ngaysinh");
                $table->string("noisinh", 50);
                $table->string("diachi", 50);
                $table->integer("malop");
                $table->integer("hocbong");
                $table->string("hinh",20);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists("sinhvien"); 
    }
};
