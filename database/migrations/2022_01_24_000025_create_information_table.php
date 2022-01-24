<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('schedule')->nullable();
            $table->longText('location')->nullable();
            $table->longText('tickets')->nullable();
            $table->timestamps();
        });
    }
}
