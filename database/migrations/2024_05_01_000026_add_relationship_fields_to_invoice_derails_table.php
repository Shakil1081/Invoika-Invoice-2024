<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoiceDerailsTable extends Migration
{
    public function up()
    {
        Schema::table('invoice_derails', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_9742102')->references('id')->on('products');
        });
    }
}
