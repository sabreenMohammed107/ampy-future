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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('emp_code')->nullable();
            $table->string('n_id')->nullable();
            $table->string('image')->nullable();
            $table->string('mobile')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('job_title_ar')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('job_title_en')->nullable();
            $table->string('address_en')->nullable();


            $table->bigInteger('company_id')->unsigned()->nullable();

            $table->dateTime('hire_date',0)->nullable();
            $table->string('bank_account')->nullable();
            $table->text('notes')->nullable();
            $table->tinyInteger('register_approved')->default(0)->comment('0 => inprogress , 1=>approved 2=>decline');
            $table->tinyInteger('active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
