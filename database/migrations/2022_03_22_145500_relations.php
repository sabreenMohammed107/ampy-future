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
         //  This is Realations for the users Table ..
    Schema::table('users', function (Blueprint $table) {
        $table->foreign('company_id')->references('id')->on('companies');

    });

       //  This is Realations for the companies Table ..
       Schema::table('companies', function (Blueprint $table) {
        $table->foreign('bank_id')->references('id')->on('banks');

    });

    //  This is Realations for the months Table ..
    Schema::table('months', function (Blueprint $table) {
        $table->foreign('year_id')->references('id')->on('years');

    });

    //  This is Realations for the transactions Table ..
    Schema::table('transactions', function (Blueprint $table) {
        $table->foreign('month_id')->references('id')->on('months');
        $table->foreign('user_id')->references('id')->on('users');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
