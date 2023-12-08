<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_tags');
            $table->string('product_qty')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->integer('selling_price');
            $table->integer('discount_price')->nullable();
            $table->text('long_describtion')->nullable();
            $table->text('short_describtion')->nullable();
            $table->string('product_thambnail');
            $table->unsignedBigInteger('vendor_id');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('specail_offer')->nullable();
            $table->integer('specail_deals')->nullable();
            $table->integer('status')->default(0);
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
