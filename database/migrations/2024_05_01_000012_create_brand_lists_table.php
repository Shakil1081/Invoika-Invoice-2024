<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandListsTable extends Migration
{
    public function up()
    {
        Schema::create('brand_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand_name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
