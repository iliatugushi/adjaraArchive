<div class="col-12 ">

    <div class="row">
        <h4 class="col-12 text-center caps sectionTitle"> {{ __('identity_area') }}</h4>

    </div>
    <hr>

    @if(!empty($archive->identifier))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('identifier') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->identifier !!} </p>
    </div>
    @endif
    @if(!empty($archive->authorised_form_of_name))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('authorised_form_of_name') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->authorised_form_of_name !!} </p>
    </div>
    @endif
    @if(!empty($archive->parallel_form_of_name))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('parallel_form_of_name') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->parallel_form_of_name !!} </p>
    </div>
    @endif
    @if(!empty($archive->other_form_of_name))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('other_form_of_name') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->other_form_of_name !!} </p>
    </div>
    @endif
    @if(!empty($archive->type_of_institution_with_archival_holdings))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">
            {{ __('type_of_institution_with_archival_holdings') }}
        </b>
        <p class="col-sm-7 showValue">
            {!! $archive->type_of_institution_with_archival_holdings !!}
        </p>
    </div>
    @endif

    @if(!empty($archive->location_and_address) )
    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <h4 class="col-12 text-center caps sectionTitle"> {{ __('contact_area') }}</h4>
    </div>
    <hr>
    @if(!empty($archive->location_and_address))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('location_and_address') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->location_and_address !!} </p>
    </div>
    @endif
    @if(!empty($archive->telephone_fax_email))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('telephone_fax_email') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->telephone_fax_email !!} </p>
    </div>
    @endif
    @if(!empty($archive->contact_persons))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('contact_persons') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->contact_persons !!} </p>
    </div>
    @endif

    @endif


    @if(!empty($archive->history_of_the_institution_with_archival_holdings) )
    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>


    <div class="row">
        <h4 class="col-12 text-center caps sectionTitle"> {{ __('description_area') }}</h4>
    </div>
    <hr>
    @if(!empty($archive->history_of_the_institution_with_archival_holdings))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('history_of_the_institution_with_archival_holdings') }}</b>
        <p class="col-sm-7 showValue">
            {!! $archive->history_of_the_institution_with_archival_holdings !!}
        </p>
    </div>
    @endif
    @if(!empty($archive->geographical_and_cultural_context))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('geographical_and_cultural_context') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->geographical_and_cultural_context !!} </p>
    </div>
    @endif
    @if(!empty($archive->mandates_sources_of_authority))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('mandates_sources_of_authority') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->mandates_sources_of_authority !!} </p>
    </div>
    @endif
    @if(!empty($archive->administrative_structure))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('administrative_structure') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->administrative_structure !!} </p>
    </div>
    @endif
    @if(!empty($archive->records_management_and_collecting_policies))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('records_management_and_collecting_policies') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->records_management_and_collecting_policies !!}
        </p>
    </div>
    @endif
    @if(!empty($archive->building))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('building') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->building !!} </p>
    </div>
    @endif
    @if(!empty($archive->archival_and_other_holdings))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('archival_and_other_holdings') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->archival_and_other_holdings !!} </p>
    </div>
    @endif
    @if(!empty($archive->finding_aids_guides_and_publications))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('finding_aids_guides_and_publications') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->finding_aids_guides_and_publications !!} </p>
    </div>
    @endif

    @endif

    @if(!empty($archive->opening_times))
    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <h4 class="col-12 text-center caps sectionTitle"> {{ __('access_area') }}</h4>
    </div>
    <hr>
    @if(!empty($archive->opening_times))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('opening_times') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->opening_times !!} </p>
    </div>
    @endif
    @if(!empty($archive->conditions_and_requirements_for_access_and_use))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('conditions_and_requirements_for_access_and_use') }}</b>
        <p class="col-sm-7 showValue">
            {!! $archive->conditions_and_requirements_for_access_and_use !!}
        </p>
    </div>
    @endif
    @if(!empty($archive->accessibility))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('accessibility') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->accessibility !!} </p>
    </div>
    @endif
    @endif

    @if(!empty($archive->research_services))
    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <h4 class="col-12 text-center caps sectionTitle"> {{ __('services_area') }}</h4>
    </div>
    <hr>
    @if(!empty($archive->research_services))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('research_services') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->research_services !!} </p>
    </div>
    @endif
    @if(!empty($archive->reproduction_services))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('reproduction_services') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->reproduction_services !!} </p>
    </div>
    @endif
    @if(!empty($archive->public_areas))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('public_areas') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->public_areas !!} </p>
    </div>
    @endif

    @endif

    @if(!empty($archive->description_identifier))
    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>
    <div class="row ">
        <h4 class="col-12 text-center caps sectionTitle"> {{ __('control_area') }}</h4>
    </div>
    <hr>
    @if(!empty($archive->description_identifier))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('description_identifier') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->description_identifier !!} </p>
    </div>
    @endif
    @if(!empty($archive->institution_identifier))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('institution_identifier') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->institution_identifier !!} </p>
    </div>
    @endif
    @if(!empty($archive->rules_and_or_conventions_used))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('rules_and_or_conventions_used') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->rules_and_or_conventions_used !!} </p>
    </div>
    @endif
    @if(!empty($archive->status))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('status') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->status !!} </p>
    </div>
    @endif
    @if(!empty($archive->level_of_detail))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('level_of_detail') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->level_of_detail !!} </p>
    </div>
    @endif
    @if(!empty($archive->dates_of_creation_revision_or_deletion))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('dates_of_creation_revision_or_deletion') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->dates_of_creation_revision_or_deletion !!} </p>
    </div>
    @endif
    @if(!empty($archive->language_and_script))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('language_and_script') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->language_and_script !!} </p>
    </div>
    @endif
    @if(!empty($archive->sources))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('sources') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->sources !!} </p>
    </div>
    @endif
    @if(!empty($archive->maintenance_notes))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('maintenance_notes') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->maintenance_notes !!} </p>
    </div>
    @endif

    @endif

    @if(!empty($archive->title_and_identifier_of_related_archival_material))
    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <h4 class="col-12 text-center caps sectionTitle">
            {{ __('RELATING_DESCRIPTIONS_OF_INSTITUTIONS') }}
        </h4>
    </div>
    <hr>
    @if(!empty($archive->title_and_identifier_of_related_archival_material))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('title_and_identifier_of_related_archival_material') }}</b>
        <p class="col-sm-7 showValue">
            {!! $archive->title_and_identifier_of_related_archival_material !!}
        </p>
    </div>
    @endif
    @if(!empty($archive->description_of_relationship))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('description_of_relationship') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->description_of_relationship !!} </p>
    </div>
    @endif
    @if(!empty($archive->dates_of_relationship))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('dates_of_relationship') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->dates_of_relationship !!} </p>
    </div>
    @endif
    @if(!empty($archive->authorised_name_and_authority_record))
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">{{ __('authorised_name_and_authority_record') }}</b>
        <p class="col-sm-7 showValue"> {!! $archive->authorised_name_and_authority_record !!} </p>
    </div>
    @endif
    @endif

    @if($archive->megzuri != null)
    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <h4 class="col-12 text-center caps sectionTitle"> {{ __('megzuri') }}</h4>
    </div>
    <hr>
    <div class="row">
        <b class="col-sm-5 caps text-right showTitle">ფაილი</b>
        <p class="col-sm-7 showValue">

            <a href="{{ asset($archive->megzuri) }}" target="_blank" class="btn btn-danger btn-xs">
                PDF
            </a>

        </p>
    </div>
    @endif
</div>
