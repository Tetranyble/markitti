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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shipping_weight');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->text('description');
            $table->string('feature');
            $table->string('seo_key_word');
            $table->integer('price');
            $table->integer('discounted_price')->nullable();
            $table->unsignedBigInteger('return_policy_id')->nullable();
            $table->unsignedBigInteger('colour_id')->nullable();
            $table->unsignedBigInteger('fabric_pattern_id')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('condition_id')->nullable();
            $table->unsignedBigInteger('product_option_id')->nullable();
            $table->unsignedBigInteger('clothing_material_id')->nullable();
            $table->boolean('has_warranty')->default(false);
            $table->text('warranty_detail')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('store_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('store_id')->references('id')->on('stores')->cascadeOnDelete();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('return_policy_id')->references('id')->on('return_policies');
            $table->foreign('fabric_pattern_id')->references('id')->on('fabric_patterns');
            $table->foreign('clothing_material_id')->references('id')->on('clothing_materials');
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->foreign('colour_id')->references('id')->on('colours');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('product_option_id')->references('id')->on('product_options');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
