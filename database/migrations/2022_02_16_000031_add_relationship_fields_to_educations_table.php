<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEducationsTable extends Migration
{
    public function up()
    {
        Schema::table('educations', function (Blueprint $table) {
            $table->unsignedBigInteger('tour_id')->nullable();
            $table->foreign('tour_id', 'tour_fk_5841510')->references('id')->on('tours');
        });
    }
}
