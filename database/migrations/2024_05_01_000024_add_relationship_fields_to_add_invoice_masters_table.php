<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddInvoiceMastersTable extends Migration
{
    public function up()
    {
        Schema::table('add_invoice_masters', function (Blueprint $table) {
            $table->unsignedBigInteger('select_client_id')->nullable();
            $table->foreign('select_client_id', 'select_client_fk_9741466')->references('id')->on('company_lists');
            $table->unsignedBigInteger('payment_status_id')->nullable();
            $table->foreign('payment_status_id', 'payment_status_fk_9741498')->references('id')->on('payment_statuses');
            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->foreign('billing_address_id', 'billing_address_fk_9741543')->references('id')->on('billing_addresses');
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->foreign('shipping_address_id', 'shipping_address_fk_9741544')->references('id')->on('shipping_addresses');
        });
    }
}
