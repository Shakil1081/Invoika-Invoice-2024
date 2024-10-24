<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->decimal('amount_paid', 15, 2);
            $table->decimal('due_amount', 15, 2);
            $table->string('payment_method');
            $table->string('transaction_id')->nullable();
            $table->string('payment_transaction_id')->nullable();
//            $table->string('invoice_path')->nullable();
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('add_invoice_masters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
