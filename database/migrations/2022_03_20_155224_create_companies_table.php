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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('logo')->nullable();

            $table->bigInteger('bank_id')->unsigned()->nullable();

            $table->text('who_we_are_ar')->nullable();
            $table->text('who_we_are_en')->nullable();
            $table->text('what_we_do_ar')->nullable();
            $table->text('what_we_do_en')->nullable();
            $table->text('ploicy_ar')->nullable();
            $table->text('ploicy_en')->nullable();
            $table->tinyInteger('active')->default(1);

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
        Schema::dropIfExists('companies');
    }
};
