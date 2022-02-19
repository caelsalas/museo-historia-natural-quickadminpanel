<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPublicationsTable extends Migration
{
    public function up()
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->unsignedBigInteger('specialty_id')->nullable();
            $table->foreign('specialty_id', 'specialty_fk_5841672')->references('id')->on('publication_specialties');
        });
    }
}
