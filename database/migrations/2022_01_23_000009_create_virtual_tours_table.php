<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualToursTable extends Migration
{
    public function up()
    {
        Schema::create('virtual_tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('summary')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('published')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
