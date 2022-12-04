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
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('code')->nullable();
            $table->boolean('is_blocked')->default(false);
            $table->string('birthday')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('has_accepted_terms')->default(false);
            $table->unsignedBigInteger('store_id')->nullable();
            $table->unsignedBigInteger('user_preference_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

//            $table->foreign('store_id')->references('id')
//                ->on('stores');

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
