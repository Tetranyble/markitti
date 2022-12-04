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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('filename');
            $table->string('extension');
            $table->string('size');
            $table->boolean('is_banner')->default(false);
            $table->morphs('resourceable');
            $table->unsignedBigInteger('store_id')->nullable()->index();
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
};
