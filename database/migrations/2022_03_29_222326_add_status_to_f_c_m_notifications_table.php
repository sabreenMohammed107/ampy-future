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
        Schema::table('f_c_m_notifications', function (Blueprint $table) {
            //
            $table->enum('status',['not_seen','seen'])->default('not_seen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('f_c_m_notifications', function (Blueprint $table) {
            //
        });
    }
};
