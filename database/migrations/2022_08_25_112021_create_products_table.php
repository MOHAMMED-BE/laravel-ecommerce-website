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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_ar');
            $table->string('product_slug_en');
            $table->string('product_slug_ar');
            $table->string('product_code');
            $table->string('product_quantity');
            $table->string('product_tags_en')->nullable();
            $table->string('product_tags_ar')->nullable();
            $table->string('product_size_en')->nullable();
            $table->string('product_size_ar')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_ar')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('description_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->string('digital_file');
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
        Schema::dropIfExists('products');
    }
};
