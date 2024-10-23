<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddInvoiceMastersTable extends Migration
{
    public function up()
    {
        Schema::create('add_invoice_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number')->unique();
            $table->date('inv_date');
            $table->decimal('sub_total', 15, 2);
            $table->unsignedInteger('discount')->nullable();
            $table->unsignedInteger('tax')->nullable();
            $table->unsignedInteger('shipping_charge')->nullable();
            $table->decimal('total_amount', 15, 2);
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
