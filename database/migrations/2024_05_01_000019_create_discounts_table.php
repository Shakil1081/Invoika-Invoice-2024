<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('discount_name')->nullable();
            $table->integer('rate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
