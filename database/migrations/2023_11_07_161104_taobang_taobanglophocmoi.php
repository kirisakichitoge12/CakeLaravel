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
        if (! Schema::hasTable("lophoc"))
        {
            Schema::create("lophoc", function(Blueprint $table){
                $table->increments("malop");
                $table->string("tenlop", 30);
                $table->string("makhoa", 10);
                $table->string("gvcn", 40);
                $table->integer("siso");
                $table->integer("hocphi");
               
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
        Schema::dropIfExists("lophoc"); 
    }
};
