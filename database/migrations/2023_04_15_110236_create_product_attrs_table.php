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
        Schema::create('product_attrs', function (Blueprint $table) {
            $table->id("attr_id");
            $table->string("ap_id")->nullable();
            $table->string("pcode")->nullable();
            $table->string("unit")->nullable();
            $table->string("srp")->nullable();
            $table->string("stock")->nullable();
            $table->string("size")->nullable();
            $table->string("color")->nullable();
            $table->string("image")->nullable();
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
        Schema::dropIfExists('product_attrs');
    }
};
