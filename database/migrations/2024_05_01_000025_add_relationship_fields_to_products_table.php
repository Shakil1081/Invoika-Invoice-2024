<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_9741829')->references('id')->on('brand_lists');
            $table->unsignedBigInteger('product_color_id')->nullable();
            $table->foreign('product_color_id', 'product_color_fk_9741831')->references('id')->on('colors');
        });
    }
}
