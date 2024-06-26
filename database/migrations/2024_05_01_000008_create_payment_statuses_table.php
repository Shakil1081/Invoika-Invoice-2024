<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_status')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
