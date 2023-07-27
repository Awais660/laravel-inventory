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
        Schema::create('products', function (Blueprint $table) {
            $table->id("pid");
            $table->string("type")->nullable();
            $table->string("pcat")->nullable();
            $table->string("psubcat")->nullable();
            $table->string("psupplier")->nullable();
            $table->string("pname")->nullable();
            $table->string("pquantity")->nullable();
            $table->string("status")->nullable();
            $table->string("pdes")->nullable();
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
        Schema::dropIfExists('products');
    }
};
