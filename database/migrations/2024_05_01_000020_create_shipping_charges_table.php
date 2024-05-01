<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingChargesTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tax_name');
            $table->string('country');
            $table->integer('tax_rate_in');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
