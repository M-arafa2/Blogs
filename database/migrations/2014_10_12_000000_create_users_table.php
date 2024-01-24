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
            $table->enum('type',['admin','user','vendor','coordinator']);
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender',['male','female']);
            $table->foreignId('country_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->string('password');
            $table->boolean('status')->default(1);

            $table->string('maarouf_link')->nullable();
            $table->string('commercial_no')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->text('desc')->nullable();
            $table->string('bank')->nullable();

            $table->string('image')->nullable();
            $table->time('to')->nullable();
            $table->time('from')->nullable();
            $table->text('service')->nullable();
            // $table->timestamp('phone_verify_at')->nullable();
            // $table->foreignId('occupation_id')->nullable();
            // $table->string('address')->nullable();
            // $table->string('company_name')->nullable();
            // $table->string('company_number')->nullable();
            // $table->string('contract')->nullable();
            // $table->string('notes')->nullable();
            // $table->string('occasion')->nullable();
            // $table->double('current_balance')->nullable();
            // $table->double('suspended_balance')->nullable();
            // $table->integer('years_of_experience')->nullable();
            // $table->text('bio')->nullable();
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
