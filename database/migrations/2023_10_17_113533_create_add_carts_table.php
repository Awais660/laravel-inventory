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
        Schema::create('add_carts', function (Blueprint $table) {
            $table->id();
            $table->string("pname")->nullable();
            $table->string("pdes")->nullable();
            $table->string("pqty")->nullable();
            $table->string("pcode")->nullable();
            $table->string("unit")->nullable();
            $table->string("srp")->nullable();
            $table->string("tunit")->nullable();
            $table->string("tsrp")->nullable();
            $table->string("size")->nullable();
            $table->string("color")->nullable();
            $table->string("image")->nullable();
            $table->string("email")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_carts');
    }
};
