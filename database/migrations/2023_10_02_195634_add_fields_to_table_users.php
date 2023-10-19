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
        Schema::table('users', function (Blueprint $table) {
            $table->string('number')->after('email_verified_at');
            $table->string('country')->after('number');
            $table->string('state')->after('country');
            $table->string('city')->after('state');
            $table->string('address1')->after('city');
            $table->string('address2')->after('address1');
            $table->string('code')->after('address2');
            $table->string('feedback')->default('1')->after('code');
            $table->string('comment')->default('1')->after('feedback');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
