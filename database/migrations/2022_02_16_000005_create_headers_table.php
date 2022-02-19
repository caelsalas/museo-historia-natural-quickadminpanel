<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('link')->nullable();
            $table->string('target')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
