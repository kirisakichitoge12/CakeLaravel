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
        
        if (! Schema::hasTable("khoa"))
        {
            Schema::create("khoa", function(Blueprint $table){
                $table->increments("makhoa");
                $table->string("tenkhoa", 50);
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
        Schema::dropIfExists("khoa"); 
    }
};
