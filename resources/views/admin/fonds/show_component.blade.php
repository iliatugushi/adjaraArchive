<div class="card-header text-center">
    <h3 class="card-title" style="font-size:13px;">
        <a href="{{route('fonds.index')}}" class="caps">
            ფონდები
        </a>
        /
        <b>
            <span style="color:#9e9e9e;font-weight:100;">
                {{ $fond->title }}
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
            <b class="col-sm-5 caps text-right showTitle">არქივი</b>
            <p class="col-sm-7 showValue">
                <a href="{{ route('archives.show', ['archive'=>$fond->archive_id]) }}">
                    {{ $fond->archive->name }}
                </a>
            </p>
            <b class="col-sm-5 caps text-right showTitle">ფონდშემქმნელი</b>
            <p class="col-sm-7 showValue">
                <a href="{{ route('creators.show', ['creator'=>$fond->creator_id]) }}">
                    {{ $fond->creator->name }}
                </a>
            </p>

            @if(!empty($fond->reference_code))
            <b class="col-sm-5 caps text-right showTitle">{{ __('reference_code') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->IdentifikatorClean }} </p> @endif

            @if(!empty($fond->title))
            <b class="col-sm-5 caps text-right showTitle">{{ __('title') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->title}} </p> @endif

            @if(!empty($fond->date))
            <b class="col-sm-5 caps text-right showTitle">{{ __('date') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->date }} </p> @endif

            @if(!empty($fond->level_of_description))
            <b class="col-sm-5 caps text-right showTitle">{{ __('level_of_description') }}</b>
            <p class="col-sm-7 showValue">
                {{ $fond->level_of_description }}
            </p> @endif

            @if(!empty($fond->extent_and_medium_of_the_unit_of_description))
            <b class="col-sm-5 caps text-right showTitle">{{ __('extent_and_medium_of_the_unit_of_description') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->extent_and_medium_of_the_unit_of_description }} @endif
            </p>
        </div>



        @if(!empty($fond->name_of_creator))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('CONTEXT_AREA') }}</h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($fond->name_of_creator))
            <b class="col-sm-5 caps text-right showTitle">{{ __('name_of_creator') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->name_of_creator }} </p> @endif

            @if(!empty($fond->administrative_biographical_history))
            <b class="col-sm-5 caps text-right showTitle">{{ __('administrative_biographical_history') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->administrative_biographical_history }} </p> @endif

            @if(!empty($fond->archival_history))
            <b class="col-sm-5 caps text-right showTitle">{{ __('archival_history') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->archival_history }} </p> @endif

            @if(!empty($fond->immediate_source_of_acquisition_or_transfer))
            <b class="col-sm-5 caps text-right showTitle">{{ __('immediate_source_of_acquisition_or_transfer') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->immediate_source_of_acquisition_or_transfer }} </p> @endif
        </div>


        @endif
        @if(!empty($fond->names_identifiers_of_related_corporate_bodies))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('CONTENT_AND_STRUCTURE_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($fond->names_identifiers_of_related_corporate_bodies))
            <b class="col-sm-5 caps text-right showTitle">{{ __('names_identifiers_of_related_corporate_bodies') }}</b>
            <p class="col-sm-7 showValue">
                {{ $fond->names_identifiers_of_related_corporate_bodies }}
            </p>
            @endif

            @if(!empty($fond->scope_and_content))
            <b class="col-sm-5 caps text-right showTitle">{{ __('scope_and_content') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->scope_and_content }} </p> @endif

            @if(!empty($fond->appraisal_destruction_and_scheduling_information))
            <b
                class="col-sm-5 caps text-right showTitle">{{ __('appraisal_destruction_and_scheduling_information') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->appraisal_destruction_and_scheduling_information }}
            </p>
            @endif

            @if(!empty($fond->accruals))
            <b class="col-sm-5 caps text-right showTitle">{{ __('accruals') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->accruals }} </p> @endif

            @if(!empty($fond->system_of_arrangement))
            <b class="col-sm-5 caps text-right showTitle">{{ __('system_of_arrangement') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->system_of_arrangement }} </p> @endif

        </div>
        @endif
        @if(!empty($fond->conditions_governing_access))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('CONDITIONS_OF_ACCESS_AND_USE_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($fond->conditions_governing_access))
            <b class="col-sm-5 caps text-right showTitle">{{ __('conditions_governing_access') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->conditions_governing_access }} </p> @endif

            @if(!empty($fond->conditions_governing_reproduction))
            <b class="col-sm-5 caps text-right showTitle">{{ __('conditions_governing_reproduction') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->conditions_governing_reproduction }} </p> @endif

            @if(!empty($fond->language_scripts_of_material))
            <b class="col-sm-5 caps text-right showTitle">{{ __('language_scripts_of_material') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->language_scripts_of_material }} </p> @endif

            @if(!empty($fond->physical_characteristics_and_technical_requirements))
            <b
                class="col-sm-5 caps text-right showTitle">{{ __('physical_characteristics_and_technical_requirements') }}</b>
            <p class="col-sm-7 showValue">
                {{ $fond->physical_characteristics_and_technical_requirements }}
            </p>
            @endif

            @if(!empty($fond->finding_aids))
            <b class="col-sm-5 caps text-right showTitle">{{ __('finding_aids') }}</b>
            <p class="col-sm-7 showValue">
                {{ $fond->finding_aids }}
            </p>
            @endif
        </div>
        @endif
        @if(!empty($fond->existence_and_location_of_originals))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('ALLIED_MATERIALS_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($fond->existence_and_location_of_originals))
            <b class="col-sm-5 caps text-right showTitle">{{ __('existence_and_location_of_originals') }}</b>
            <p class="col-sm-7 showValue">
                {{ $fond->existence_and_location_of_originals }}
            </p>
            @endif

            @if(!empty($fond->existence_and_location_of_copies))
            <b class="col-sm-5 caps text-right showTitle">{{ __('existence_and_location_of_copies') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->existence_and_location_of_copies }} </p> @endif

            @if(!empty($fond->related_units_of_description))
            <b class="col-sm-5 caps text-right showTitle">{{ __('related_units_of_description') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->related_units_of_description }} </p> @endif

            @if(!empty($fond->publication_note))
            <b class="col-sm-5 caps text-right showTitle">{{ __('publication_note') }}</b>
            <p class="col-sm-7 showValue">
                {{ $fond->publication_note }}
            </p>
            @endif
        </div>
        @endif


        @if(!empty($fond->note))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('NOTES_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($fond->note))
            <b class="col-sm-5 caps text-right showTitle">{{ __('note') }}</b>
            <p class="col-sm-7 showValue">
                {{ $fond->note }}
            </p>
            @endif
        </div>
        @endif
        <hr>
        @if(!empty($fond->archivists_note))
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('DESCRIPTION_CONTROL_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($fond->archivists_note))
            <b class="col-sm-5 caps text-right showTitle">{{ __('archivists_note') }}</b>
            <p class="col-sm-7 showValue">
                {{ $fond->archivists_note }}
            </p>
            @endif

            @if(!empty($fond->rules_or_conventions))
            <b class="col-sm-5 caps text-right showTitle">{{ __('rules_or_conventions') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->rules_or_conventions }} </p> @endif

            @if(!empty($fond->date_of_descriptions))
            <b class="col-sm-5 caps text-right showTitle">{{ __('date_of_descriptions') }}</b>
            <p class="col-sm-7 showValue"> {{ $fond->date_of_descriptions }} </p> @endif
        </div>

        @endif


    </div>

</div>
