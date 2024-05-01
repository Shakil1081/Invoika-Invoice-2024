<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxListsTable extends Migration
{
    public function up()
    {
        Schema::create('tax_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tax_name')->unique();
            $table->string('tax_rate_in');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
