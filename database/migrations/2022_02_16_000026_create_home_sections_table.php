<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('home_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meta_title')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_description_en')->nullable();
            $table->longText('info_schedule')->nullable();
            $table->longText('info_schedule_en')->nullable();
            $table->longText('info_address')->nullable();
            $table->longText('info_address_en')->nullable();
            $table->longText('info_tickets')->nullable();
            $table->longText('info_tickets_en')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
