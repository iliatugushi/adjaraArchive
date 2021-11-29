<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchievesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->longText('identifier');
            $table->longText('authorised_form_of_name');
            $table->longText('parallel_form_of_name')->nullable();
            $table->longText('other_form_of_name')->nullable();
            $table->longText('type_of_institution_with_archival_holdings')->nullable();


            $table->longText('location_and_address')->nullable();
            $table->longText('telephone_fax_email')->nullable();
            $table->longText('contact_persons')->nullable();


            $table->longText('history_of_the_institution_with_archival_holdings')->nullable();
            $table->longText('geographical_and_cultural_context')->nullable();
            $table->longText('mandates_sources_of_authority')->nullable();
            $table->longText('administrative_structure')->nullable();
            $table->longText('records_management_and_collecting_policies')->nullable();
            $table->longText('building')->nullable();
            $table->longText('archival_and_other_holdings')->nullable();
            $table->longText('finding_aids_guides_and_publications')->nullable();

            $table->longText('opening_times')->nullable();
            $table->longText('conditions_and_requirements_for_access_and_use')->nullable();
            $table->longText('accessibility')->nullable();

            $table->longText('research_services')->nullable();
            $table->longText('reproduction_services')->nullable();
            $table->longText('public_areas')->nullable();

            $table->longText('description_identifier')->nullable();
            $table->longText('institution_identifier')->nullable();
            $table->longText('rules_and_or_conventions_used')->nullable();
            $table->longText('status')->nullable();
            $table->longText('level_of_detail')->nullable();
            $table->longText('dates_of_creation_revision_or_deletion')->nullable();
            $table->longText('language_and_script')->nullable();
            $table->longText('sources')->nullable();
            $table->longText('maintenance_notes')->nullable();

            $table->longText('title_and_identifier_of_related_archival_material')->nullable();
            $table->longText('description_of_relationship')->nullable();
            $table->longText('dates_of_relationship')->nullable();
            $table->longText('authorised_name_and_authority_record')->nullable();
        });
    }

    /*
    */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives');
    }
}
