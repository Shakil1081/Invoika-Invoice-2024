<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->longText('billing_address');
            $table->string('billing_mobile_number');
            $table->string('billing_tax_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
