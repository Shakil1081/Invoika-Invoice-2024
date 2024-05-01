<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDerailsTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_derails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('rate', 15, 2);
            $table->string('quantity');
            $table->string('product_details')->nullable();
            $table->decimal('amount', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
