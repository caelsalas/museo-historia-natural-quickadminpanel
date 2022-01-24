<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventsTable extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_5841663')->references('id')->on('event_types');
            $table->unsignedBigInteger('audience_id')->nullable();
            $table->foreign('audience_id', 'audience_fk_5841664')->references('id')->on('event_audiences');
            $table->unsignedBigInteger('modality_id')->nullable();
            $table->foreign('modality_id', 'modality_fk_5841665')->references('id')->on('event_modalities');
            $table->unsignedBigInteger('cost_id')->nullable();
            $table->foreign('cost_id', 'cost_fk_5841666')->references('id')->on('event_costs');
        });
    }
}
