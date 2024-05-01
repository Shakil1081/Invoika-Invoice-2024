<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryListProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_list_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_9741830')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('category_list_id');
            $table->foreign('category_list_id', 'category_list_id_fk_9741830')->references('id')->on('category_lists')->onDelete('cascade');
        });
    }
}
