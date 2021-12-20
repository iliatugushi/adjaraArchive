<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('sakme_id')->nullable();

            $table->longText('reference_code')->nullable();
            $table->longText('title')->nullable();
            $table->longText('date')->nullable();
            $table->longText('level_of_description')->nullable();
            $table->longText('extent_and_medium_of_the_unit_of_description')->nullable();

            $table->longText('name_of_creator')->nullable();
            $table->longText('administrative_biographical_history')->nullable();
            $table->longText('archival_history')->nullable();
            $table->longText('immediate_source_of_acquisition_or_transfer')->nullable();


            $table->longText('scope_and_content')->nullable();
            $table->longText('appraisal_destruction_and_scheduling_information')->nullable();
            $table->longText('accruals')->nullable();
            $table->longText('system_of_arrangement')->nullable();

            $table->longText('conditions_governing_access')->nullable();
            $table->longText('conditions_governing_reproduction')->nullable();
            $table->longText('language_scripts_of_material')->nullable();
            $table->longText('physical_characteristics_and_technical_requirements')->nullable();
            $table->longText('finding_aids')->nullable();


            $table->longText('existence_and_location_of_originals')->nullable();
            $table->longText('existence_and_location_of_copies')->nullable();
            $table->longText('related_units_of_description')->nullable();
            $table->longText('related_units_of_description_comment')->nullable();
            $table->longText('publication_note')->nullable();

            $table->longText('note')->nullable();

            $table->longText('archivists_note')->nullable();
            $table->longText('rules_or_conventions')->nullable();
            $table->longText('date_of_descriptions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
