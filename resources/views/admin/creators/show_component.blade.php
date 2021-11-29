<div class="card-header text-center">
    <h3 class="card-title" style="font-size:13px;">
        <a href="{{route('creators.index')}}" class="caps">
            ფონდშემქმნელები
        </a>
        /
        <b>
            <span style="color:#9e9e9e;font-weight:100;">
                {{ $creator->authorised_form_of_name }}
            </span>
        </b>
    </h3>
</div>
<div class="card-body">


    <div class="col-12 ">

        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('identity_area') }}</h4>

        </div>
        <hr>

        <div class="row">

            @if(!empty($creator->identifier))
            <b class="col-sm-5 caps text-right showTitle">{{ __('identifier') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->identifier }} </p>
            @endif



            @if(!empty($creator->type_id))
            <b class="col-sm-5 caps text-right showTitle">{{ __('type_of_entity') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->type->name }} </p>
            @endif

            @if(!empty($creator->authorised_form_of_name))
            <b class="col-sm-5 caps text-right showTitle">{{ __('authorised_form_of_name') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->authorised_form_of_name }} </p>
            @endif

            @if(!empty($creator->standardized_forms_of_name_according_to_other_rules))
            <b class="col-sm-5 caps text-right showTitle">
                {{ __('standardized_forms_of_name_according_to_other_rules') }}
            </b>
            <p class="col-sm-7 showValue">
                {{ $creator->standardized_forms_of_name_according_to_other_rules }}
            </p>
            @endif

            @if(!empty($creator->other_form_of_name))
            <b class="col-sm-5 caps text-right showTitle">{{ __('other_form_of_name') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->other_form_of_name }} </p>
            @endif

            @if(!empty($creator->identifiers_for_corporate_bodies))
            <b class="col-sm-5 caps text-right showTitle">{{ __('identifiers_for_corporate_bodies') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->identifiers_for_corporate_bodies }} </p>
            @endif
        </div>


        @if(!empty($archive->dates_of_existence))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('description_area') }}</h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($creator->dates_of_existence))
            <b class="col-sm-5 caps text-right showTitle">{{ __('dates_of_existence') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->dates_of_existence }} </p>
            @endif

            @if(!empty($creator->history))
            <b class="col-sm-5 caps text-right showTitle">{{ __('history') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->history }} </p>
            @endif

            @if(!empty($creator->places))
            <b class="col-sm-5 caps text-right showTitle">{{ __('places') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->places }} </p>
            @endif

            @if(!empty($creator->legal_status))
            <b class="col-sm-5 caps text-right showTitle">{{ __('legal_status') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->legal_status }} </p>
            @endif

            @if(!empty($creator->functions_occupations_and_activities))
            <b class="col-sm-5 caps text-right showTitle">{{ __('functions_occupations_and_activities') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->functions_occupations_and_activities }} </p>
            @endif

            @if(!empty($creator->mandates_sources_of_authority))
            <b class="col-sm-5 caps text-right showTitle">{{ __('mandates_sources_of_authority') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->mandates_sources_of_authority }} </p>
            @endif

            @if(!empty($creator->internal_structures_genealogy))
            <b class="col-sm-5 caps text-right showTitle">{{ __('internal_structures_genealogy') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->internal_structures_genealogy }} </p>
            @endif

            @if(!empty($creator->general_context))
            <b class="col-sm-5 caps text-right showTitle">{{ __('general_context') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->general_context }} </p>
            @endif
        </div>
        <hr>
        @endif

        @if(!empty($archive->names_identifiers_of_related_corporate_bodies))
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('RELATIONSHIPS_AREA') }}</h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($creator->names_identifiers_of_related_corporate_bodies))
            <b class="col-sm-5 caps text-right showTitle">{{ __('names_identifiers_of_related_corporate_bodies') }}</b>
            <p class="col-sm-7 showValue">
                {{ $creator->names_identifiers_of_related_corporate_bodies }}
            </p>
            @endif

            @if(!empty($creator->category_of_relationship))
            <b class="col-sm-5 caps text-right showTitle">{{ __('category_of_relationship') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->category_of_relationship }} </p>
            @endif

            @if(!empty($creator->description_of_relationship))
            <b class="col-sm-5 caps text-right showTitle">{{ __('description_of_relationship') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->description_of_relationship }} </p>
            @endif

            @if(!empty($creator->dates_of_the_relationship))
            <b class="col-sm-5 caps text-right showTitle">{{ __('dates_of_the_relationship') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->dates_of_the_relationship }} </p>
            @endif
        </div>

        @endif

        @if(!empty($archive->names_identifiers_of_related_corporate_bodies))
        <hr>

        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('control_area') }}</h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($creator->authority_record_identifier))
            <b class="col-sm-5 caps text-right showTitle">{{ __('authority_record_identifier') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->authority_record_identifier }} </p>
            @endif

            @if(!empty($creator->institution_identifiers))
            <b class="col-sm-5 caps text-right showTitle">{{ __('institution_identifiers') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->institution_identifiers }} </p>
            @endif

            @if(!empty($creator->rules_and_or_conventions))
            <b class="col-sm-5 caps text-right showTitle">{{ __('rules_and_or_conventions') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->rules_and_or_conventions }} </p>
            @endif

            @if(!empty($creator->status))
            <b class="col-sm-5 caps text-right showTitle">{{ __('status') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->status }} </p>
            @endif

            @if(!empty($creator->level_of_detail))
            <b class="col-sm-5 caps text-right showTitle">{{ __('level_of_detail') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->level_of_detail }} </p>
            @endif

            @if(!empty($creator->dates_of_creationrevision_or_deletion))
            <b class="col-sm-5 caps text-right showTitle">{{ __('dates_of_creationrevision_or_deletion') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->dates_of_creationrevision_or_deletion }}
            </p>
            @endif

            @if(!empty($creator->language_and_script))
            <b class="col-sm-5 caps text-right showTitle">{{ __('language_and_script') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->language_and_script }} </p>
            @endif

            @if(!empty($creator->sources))
            <b class="col-sm-5 caps text-right showTitle">{{ __('sources') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->sources }} </p>
            @endif

            @if(!empty($creator->maintenance_notes))
            <b class="col-sm-5 caps text-right showTitle">{{ __('maintenance_notes') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->maintenance_notes }} </p>
            @endif
        </div>

        @endif
        <hr>
        @if(!empty($creator->identifiers_and_titles_of_related_resources))
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('RELATING_DESCRIPTIONS_OF_INSTITUTIONS') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($creator->identifiers_and_titles_of_related_resources))
            <b class="col-sm-5 caps text-right showTitle">{{ __('identifiers_and_titles_of_related_resources') }}</b>
            <p class="col-sm-7 showValue">
                {{ $creator->identifiers_and_titles_of_related_resources }}
            </p>
            @endif

            @if(!empty($creator->types_of_related_resources))
            <b class="col-sm-5 caps text-right showTitle">{{ __('types_of_related_resources') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->types_of_related_resources }} </p>
            @endif

            @if(!empty($creator->nature_of_relationships))
            <b class="col-sm-5 caps text-right showTitle">{{ __('nature_of_relationships') }}</b>
            <p class="col-sm-7 showValue"> {{ $creator->nature_of_relationships }} </p>
            @endif
            @if(!empty($creator->dates_of_related_resources_and_or_relationships))
            <b
                class="col-sm-5 caps text-right showTitle">{{ __('dates_of_related_resources_and_or_relationships') }}</b>
            <p class="col-sm-7 showValue">
                {{ $creator->dates_of_related_resources_and_or_relationships }}
            </p>
            @endif
        </div>
        @endif
    </div>
</div>
