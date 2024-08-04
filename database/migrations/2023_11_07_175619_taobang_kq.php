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
        //
        if (! Schema::hasTable("ketqua"))
        {
            Schema::create("ketqua", function(Blueprint $table){
                $table->increments("id");
                $table->integer("masv");
                $table->integer("mamh");
                $table->integer("lanthi");
                $table->float("diemthi",8,2);             
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
        Schema::dropIfExists("ketqua"); 
    }
};
