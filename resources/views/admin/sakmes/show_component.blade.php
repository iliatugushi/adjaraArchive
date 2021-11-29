<div class="card-header text-center">
    <h3 class="card-title" style="font-size:13px;">
        <a href="{{route('sakmes.index', ['anaweri' => $sakme->anaweri->id])}}" class="caps">
            საქმე
        </a>
        /
        <b>
            <span style="color:#9e9e9e;font-weight:100;">
                {{ $sakme->title }}
            </span>
        </b>

    </h3>
    <div class="card-tools">
        <a href="{{ route('sakmes.viewFiles', ['sakme' => $sakme->id]) }}" class="btn btn-default btn-sm caps ">
            ფაილების დათვალიერება
        </a>

    </div>

</div>
<div class="card-body">
    <div class="col-12 ">

        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('identity_area') }}</h4>

        </div>
        <hr>

        <div class="row">

            <b class="col-sm-5 caps text-right showTitle">ანაწერი</b>
            <p class="col-sm-7 showValue">
                <a href="{{ route('anaweris.show', ['anaweri'=>$sakme->anaweri_id]) }}">
                    {{ $sakme->anaweri->name }}
                </a>
            </p>
            <b class="col-sm-5 caps text-right showTitle">{{ __('reference_code') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->reference_code }} </p>

            <b class="col-sm-5 caps text-right showTitle">{{ __('title') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->title}} </p>

            <b class="col-sm-5 caps text-right showTitle">{{ __('date') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->date }} </p>

            <b class="col-sm-5 caps text-right showTitle">{{ __('level_of_description') }}</b>
            <p class="col-sm-7 showValue">
                {{ $sakme->level_of_description }}
            </p>

            <b class="col-sm-5 caps text-right showTitle">{{ __('extent_and_medium_of_the_unit_of_description') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->extent_and_medium_of_the_unit_of_description }}
            </p>
        </div>


        @if(!empty($sakme->name_of_creator))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('CONTEXT_AREA') }}</h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($sakme->name_of_creator))
            <b class="col-sm-5 caps text-right showTitle">{{ __('name_of_creator') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->name_of_creator }} </p> @endif

            @if(!empty($sakme->administrative_biographical_history))
            <b class="col-sm-5 caps text-right showTitle">{{ __('administrative_biographical_history') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->administrative_biographical_history }} </p> @endif

            @if(!empty($sakme->archival_history))
            <b class="col-sm-5 caps text-right showTitle">{{ __('archival_history') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->archival_history }} </p> @endif

            @if(!empty($sakme->immediate_source_of_acquisition_or_transfer))
            <b class="col-sm-5 caps text-right showTitle">{{ __('immediate_source_of_acquisition_or_transfer') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->immediate_source_of_acquisition_or_transfer }} </p> @endif
        </div>


        @endif
        @if(!empty($sakme->names_identifiers_of_related_corporate_bodies))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('CONTENT_AND_STRUCTURE_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($sakme->names_identifiers_of_related_corporate_bodies))
            <b class="col-sm-5 caps text-right showTitle">{{ __('names_identifiers_of_related_corporate_bodies') }}</b>
            <p class="col-sm-7 showValue">
                {{ $sakme->names_identifiers_of_related_corporate_bodies }}
            </p>
            @endif

            @if(!empty($sakme->scope_and_content))
            <b class="col-sm-5 caps text-right showTitle">{{ __('scope_and_content') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->scope_and_content }} </p> @endif

            @if(!empty($sakme->appraisal_destruction_and_scheduling_information))
            <b
                class="col-sm-5 caps text-right showTitle">{{ __('appraisal_destruction_and_scheduling_information') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->appraisal_destruction_and_scheduling_information }}
            </p>
            @endif

            @if(!empty($sakme->accruals))
            <b class="col-sm-5 caps text-right showTitle">{{ __('accruals') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->accruals }} </p> @endif

            @if(!empty($sakme->system_of_arrangement))
            <b class="col-sm-5 caps text-right showTitle">{{ __('system_of_arrangement') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->system_of_arrangement }} </p> @endif

        </div>
        @endif
        @if(!empty($sakme->conditions_governing_access))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('CONDITIONS_OF_ACCESS_AND_USE_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($sakme->conditions_governing_access))
            <b class="col-sm-5 caps text-right showTitle">{{ __('conditions_governing_access') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->conditions_governing_access }} </p> @endif

            @if(!empty($sakme->conditions_governing_reproduction))
            <b class="col-sm-5 caps text-right showTitle">{{ __('conditions_governing_reproduction') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->conditions_governing_reproduction }} </p> @endif

            @if(!empty($sakme->language_scripts_of_material))
            <b class="col-sm-5 caps text-right showTitle">{{ __('language_scripts_of_material') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->language_scripts_of_material }} </p> @endif

            @if(!empty($sakme->physical_characteristics_and_technical_requirements))
            <b
                class="col-sm-5 caps text-right showTitle">{{ __('physical_characteristics_and_technical_requirements') }}</b>
            <p class="col-sm-7 showValue">
                {{ $sakme->physical_characteristics_and_technical_requirements }}
            </p>
            @endif

            @if(!empty($sakme->finding_aids))
            <b class="col-sm-5 caps text-right showTitle">{{ __('finding_aids') }}</b>
            <p class="col-sm-7 showValue">
                {{ $sakme->finding_aids }}
            </p>
            @endif
        </div>
        @endif
        @if(!empty($sakme->existence_and_location_of_originals))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('ALLIED_MATERIALS_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($sakme->existence_and_location_of_originals))
            <b class="col-sm-5 caps text-right showTitle">{{ __('existence_and_location_of_originals') }}</b>
            <p class="col-sm-7 showValue">
                {{ $sakme->existence_and_location_of_originals }}
            </p>
            @endif

            @if(!empty($sakme->existence_and_location_of_copies))
            <b class="col-sm-5 caps text-right showTitle">{{ __('existence_and_location_of_copies') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->existence_and_location_of_copies }} </p> @endif

            @if(!empty($sakme->related_units_of_description))
            <b class="col-sm-5 caps text-right showTitle">{{ __('related_units_of_description') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->related_units_of_description }} </p> @endif

            @if(!empty($sakme->publication_note))
            <b class="col-sm-5 caps text-right showTitle">{{ __('publication_note') }}</b>
            <p class="col-sm-7 showValue">
                {{ $sakme->publication_note }}
            </p>
            @endif
        </div>
        @endif


        @if(!empty($sakme->note))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('NOTES_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($sakme->note))
            <b class="col-sm-5 caps text-right showTitle">{{ __('note') }}</b>
            <p class="col-sm-7 showValue">
                {{ $sakme->note }}
            </p>
            @endif
        </div>
        @endif
        <hr>
        @if(!empty($sakme->archivists_note))
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('DESCRIPTION_CONTROL_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($sakme->archivists_note))
            <b class="col-sm-5 caps text-right showTitle">{{ __('archivists_note') }}</b>
            <p class="col-sm-7 showValue">
                {{ $sakme->archivists_note }}
            </p>
            @endif

            @if(!empty($sakme->rules_or_conventions))
            <b class="col-sm-5 caps text-right showTitle">{{ __('rules_or_conventions') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->rules_or_conventions }} </p> @endif

            @if(!empty($sakme->date_of_descriptions))
            <b class="col-sm-5 caps text-right showTitle">{{ __('date_of_descriptions') }}</b>
            <p class="col-sm-7 showValue"> {{ $sakme->date_of_descriptions }} </p> @endif
        </div>

        @endif


    </div>

</div>
