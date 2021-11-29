<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creators', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('type_id')->nullable();

            $table->longText('identifier');
            $table->longText('authorised_form_of_name');
            $table->longText('parallel_form_of_name')->nullable();
            $table->longText('standardized_forms_of_name_according_to_other_rules')->nullable();
            $table->longText('other_form_of_name')->nullable();
            $table->longText('identifiers_for_corporate_bodies')->nullable();


            $table->longText('dates_of_existence')->nullable();
            $table->longText('history')->nullable();
            $table->longText('places')->nullable();
            $table->longText('legal_status')->nullable();
            $table->longText('functions_occupations_and_activities')->nullable();
            $table->longText('mandates_sources_of_authority')->nullable();
            $table->longText('internal_structures_genealogy')->nullable();
            $table->longText('general_context')->nullable();


            $table->longText('names_identifiers_of_related_corporate_bodies')->nullable();
            $table->longText('category_of_relationship')->nullable();
            $table->longText('description_of_relationship')->nullable();
            $table->longText('dates_of_the_relationship')->nullable();


            $table->longText('authority_record_identifier')->nullable();
            $table->longText('institution_identifiers')->nullable();
            $table->longText('rules_and_or_conventions')->nullable();
            $table->longText('status')->nullable();
            $table->longText('level_of_detail')->nullable();
            $table->longText('dates_of_creationrevision_or_deletion')->nullable();
            $table->longText('language_and_script')->nullable();
            $table->longText('sources')->nullable();
            $table->longText('maintenance_notes')->nullable();


            $table->longText('identifiers_and_titles_of_related_resources')->nullable();
            $table->longText('types_of_related_resources')->nullable();
            $table->longText('nature_of_relationships')->nullable();
            $table->longText('dates_of_related_resources_and_or_relationships')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creators');
    }
}
