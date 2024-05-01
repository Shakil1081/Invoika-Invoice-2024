<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shipping_name');
            $table->longText('shippling_address')->nullable();
            $table->string('shippling_mobile_number');
            $table->string('shippling_tax_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
