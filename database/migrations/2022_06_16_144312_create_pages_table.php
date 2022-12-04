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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->string('name');
            $table->string('view_count')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('detail')->nullable();
            $table->boolean('is_published')->default(false);
//            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('page_type_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores')->cascadeOnDelete();
            $table->foreign('page_type_id')->references('id')->on('page_types')->cascadeOnDelete();
            //$table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
