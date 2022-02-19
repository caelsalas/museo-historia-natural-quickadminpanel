<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('author')->nullable();
            $table->longText('content')->nullable();
            $table->string('type')->nullable();
            $table->string('link')->nullable();
            $table->string('target')->nullable();
            $table->date('date');
            $table->boolean('published')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
