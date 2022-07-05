<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags');
            $table->string('product_size')->nullable();
            $table->string('product_color');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_description');
            $table->text('long_description');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->default(0);
            $table->integer('featured')->default(0);
            $table->integer('speacial_offer')->default(0);
            $table->integer('speacial_deals')->default(0);
            $table->integer('status')->default(0);
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
}
