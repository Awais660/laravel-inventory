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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('pname')->nullable();
            $table->string('pdes')->nullable();
            $table->string('proprice')->nullable();
            $table->string('proimage')->nullable();
            $table->string('quantity')->nullable();
            $table->string('tprice')->nullable();
            $table->string('srp')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('code')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->string('order')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
