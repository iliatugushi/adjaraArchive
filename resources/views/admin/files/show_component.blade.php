<div class="card-header text-center">
    <h3 class="card-title" style="font-size:13px;">
        <a href="{{route('files.index', ['sakme' => $file->sakme->id])}}" class="caps">
            ფაილი
        </a>
        /
        <b>
            <span style="color:#9e9e9e;font-weight:100;">
                {{ $file->title }}
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
            <b class="col-sm-5 caps text-right showTitle">საქმე</b>
            <p class="col-sm-7 showValue">
                <a href="{{ route('sakmes.show', ['sakme'=>$file->sakme_id]) }}">
                    {{ $file->sakme->name }}
                </a>
            </p>
            <b class="col-sm-5 caps text-right showTitle">{{ __('reference_code') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->reference_code }} </p>

            <b class="col-sm-5 caps text-right showTitle">{{ __('title') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->title}} </p>

            <b class="col-sm-5 caps text-right showTitle">{{ __('date') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->date }} </p>

            <b class="col-sm-5 caps text-right showTitle">{{ __('level_of_description') }}</b>
            <p class="col-sm-7 showValue">
                {{ $file->level_of_description }}
            </p>

            <b class="col-sm-5 caps text-right showTitle">{{ __('extent_and_medium_of_the_unit_of_description') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->extent_and_medium_of_the_unit_of_description }}
            </p>
        </div>


        @if(!empty($file->name_of_creator))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('CONTEXT_AREA') }}</h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($file->name_of_creator))
            <b class="col-sm-5 caps text-right showTitle">{{ __('name_of_creator') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->name_of_creator }} </p> @endif

            @if(!empty($file->administrative_biographical_history))
            <b class="col-sm-5 caps text-right showTitle">{{ __('administrative_biographical_history') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->administrative_biographical_history }} </p> @endif

            @if(!empty($file->archival_history))
            <b class="col-sm-5 caps text-right showTitle">{{ __('archival_history') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->archival_history }} </p> @endif

            @if(!empty($file->immediate_source_of_acquisition_or_transfer))
            <b class="col-sm-5 caps text-right showTitle">{{ __('immediate_source_of_acquisition_or_transfer') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->immediate_source_of_acquisition_or_transfer }} </p> @endif
        </div>


        @endif
        @if(!empty($file->names_identifiers_of_related_corporate_bodies))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle"> {{ __('CONTENT_AND_STRUCTURE_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($file->names_identifiers_of_related_corporate_bodies))
            <b class="col-sm-5 caps text-right showTitle">{{ __('names_identifiers_of_related_corporate_bodies') }}</b>
            <p class="col-sm-7 showValue">
                {{ $file->names_identifiers_of_related_corporate_bodies }}
            </p>
            @endif

            @if(!empty($file->scope_and_content))
            <b class="col-sm-5 caps text-right showTitle">{{ __('scope_and_content') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->scope_and_content }} </p> @endif

            @if(!empty($file->appraisal_destruction_and_scheduling_information))
            <b
                class="col-sm-5 caps text-right showTitle">{{ __('appraisal_destruction_and_scheduling_information') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->appraisal_destruction_and_scheduling_information }}
            </p>
            @endif

            @if(!empty($file->accruals))
            <b class="col-sm-5 caps text-right showTitle">{{ __('accruals') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->accruals }} </p> @endif

            @if(!empty($file->system_of_arrangement))
            <b class="col-sm-5 caps text-right showTitle">{{ __('system_of_arrangement') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->system_of_arrangement }} </p> @endif

        </div>
        @endif
        @if(!empty($file->conditions_governing_access))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('CONDITIONS_OF_ACCESS_AND_USE_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($file->conditions_governing_access))
            <b class="col-sm-5 caps text-right showTitle">{{ __('conditions_governing_access') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->conditions_governing_access }} </p> @endif

            @if(!empty($file->conditions_governing_reproduction))
            <b class="col-sm-5 caps text-right showTitle">{{ __('conditions_governing_reproduction') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->conditions_governing_reproduction }} </p> @endif

            @if(!empty($file->language_scripts_of_material))
            <b class="col-sm-5 caps text-right showTitle">{{ __('language_scripts_of_material') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->language_scripts_of_material }} </p> @endif

            @if(!empty($file->physical_characteristics_and_technical_requirements))
            <b
                class="col-sm-5 caps text-right showTitle">{{ __('physical_characteristics_and_technical_requirements') }}</b>
            <p class="col-sm-7 showValue">
                {{ $file->physical_characteristics_and_technical_requirements }}
            </p>
            @endif

            @if(!empty($file->finding_aids))
            <b class="col-sm-5 caps text-right showTitle">{{ __('finding_aids') }}</b>
            <p class="col-sm-7 showValue">
                {{ $file->finding_aids }}
            </p>
            @endif
        </div>
        @endif
        @if(!empty($file->existence_and_location_of_originals))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('ALLIED_MATERIALS_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($file->existence_and_location_of_originals))
            <b class="col-sm-5 caps text-right showTitle">{{ __('existence_and_location_of_originals') }}</b>
            <p class="col-sm-7 showValue">
                {{ $file->existence_and_location_of_originals }}
            </p>
            @endif

            @if(!empty($file->existence_and_location_of_copies))
            <b class="col-sm-5 caps text-right showTitle">{{ __('existence_and_location_of_copies') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->existence_and_location_of_copies }} </p> @endif

            @if(!empty($file->related_units_of_description))
            <b class="col-sm-5 caps text-right showTitle">{{ __('related_units_of_description') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->related_units_of_description }} </p> @endif

            @if(!empty($file->publication_note))
            <b class="col-sm-5 caps text-right showTitle">{{ __('publication_note') }}</b>
            <p class="col-sm-7 showValue">
                {{ $file->publication_note }}
            </p>
            @endif
        </div>
        @endif


        @if(!empty($file->note))
        <hr>
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('NOTES_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($file->note))
            <b class="col-sm-5 caps text-right showTitle">{{ __('note') }}</b>
            <p class="col-sm-7 showValue">
                {{ $file->note }}
            </p>
            @endif
        </div>
        @endif
        <hr>
        @if(!empty($file->archivists_note))
        <div class="row">
            <h4 class="col-12 text-center caps sectionTitle">
                {{ __('DESCRIPTION_CONTROL_AREA') }}
            </h4>
        </div>
        <hr>
        <div class="row">
            @if(!empty($file->archivists_note))
            <b class="col-sm-5 caps text-right showTitle">{{ __('archivists_note') }}</b>
            <p class="col-sm-7 showValue">
                {{ $file->archivists_note }}
            </p>
            @endif

            @if(!empty($file->rules_or_conventions))
            <b class="col-sm-5 caps text-right showTitle">{{ __('rules_or_conventions') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->rules_or_conventions }} </p> @endif

            @if(!empty($file->date_of_descriptions))
            <b class="col-sm-5 caps text-right showTitle">{{ __('date_of_descriptions') }}</b>
            <p class="col-sm-7 showValue"> {{ $file->date_of_descriptions }} </p> @endif
        </div>

        @endif


    </div>

</div>
