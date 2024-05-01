<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyListsTable extends Migration
{
    public function up()
    {
        Schema::create('company_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('website_url')->nullable();
            $table->string('email')->unique();
            $table->string('contact_no')->unique();
            $table->string('postalcode');
            $table->string('invoice_number_slug');
            $table->longText('address');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
