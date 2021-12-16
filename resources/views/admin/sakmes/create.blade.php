@extends('layouts.admin')

@section('js')
<script>
    $(document).ready(function() {
     $('.objectsL').addClass('active');
    });
</script>
@endsection

@section('css')
<style>
    .nav-tabs .nav-link {
        font-size: 13px;
        color: #9e9e9e;
    }

    .nav-tabs .nav-link:hover,
    .nav-tabs .nav-link.active {
        color: black;
    }

    label,
    textarea,
    select {
        font-size: 13px !important;
    }
</style>
@endsection
@section('content')
<form method="post"
    action="{{ $mode === 'create' ? route('sakmes.store') : route('sakmes.update', ['sakme' => $sakme->id]) }}"
    enctype="multipart/form-data">
    {{ csrf_field() }}
    @if($mode === 'edit')
    <input type="hidden" name="_method" value="put">
    @endif
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card card-white ">
                    <div class="card-header">
                        <h3 class="card-title caps">
                            <b>
                                <a href="{{route('sakmes.index', ['anaweri' => $anaweri->id])}}">
                                    საქმე
                                </a>
                                -
                                <span style=" color:#9e9e9e;font-weight:100;">
                                    @if($mode === 'create')
                                    ახალი მონაცემის დამატება
                                    @else
                                    {{ $sakme->reference_code }} - რედაქტირება
                                    @endif
                                </span>
                            </b>
                        </h3>
                        <div class="card-tools">
                            <a href="{{route('sakmes.index', ['anaweri' => $anaweri->id])}}"
                                class="btn btn-block btn-outline-secondary btn-xs caps">
                                უკან
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-12 row">
                            <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="custom-tabs-three-tab1-tab" data-toggle="pill"
                                        href="#custom-tabs-three-tab1" role="tab" aria-controls="custom-tabs-three-tab1"
                                        aria-selected="true">
                                        {{ __('identity_area') }} *
                                    </a>
                                    <a class="nav-link" id="custom-tabs-three-tab2-tab" data-toggle="pill"
                                        href="#custom-tabs-three-tab2" role="tab" aria-controls="custom-tabs-three-tab2"
                                        aria-selected="false">
                                        {{ __('CONTEXT_AREA') }}
                                    </a>
                                    <a class="nav-link" id="custom-tabs-three-tab3-tab" data-toggle="pill"
                                        href="#custom-tabs-three-tab3" role="tab" aria-controls="custom-tabs-three-tab3"
                                        aria-selected="false">
                                        {{ __('CONTENT_AND_STRUCTURE_AREA') }}
                                    </a>
                                    <a class="nav-link" id="tab-4" data-toggle="pill" href="#custom-tabs-three-tab4"
                                        role="tab" aria-controls="custom-tabs-three-tab4" aria-selected="false">
                                        {{__('CONDITIONS_OF_ACCESS_AND_USE_AREA')}}
                                    </a>

                                    <a class="nav-link" id="tab-5" data-toggle="pill" href="#custom-tabs-three-tab5"
                                        role="tab" aria-controls="custom-tabs-three-tab5" aria-selected="false">
                                        {{__('ALLIED_MATERIALS_AREA')}}
                                    </a>

                                    <a class="nav-link" id="tab-6" data-toggle="pill" href="#custom-tabs-three-tab6"
                                        role="tab" aria-controls="custom-tabs-three-tab6" aria-selected="false">
                                        {{__('NOTES_AREA')}}
                                    </a>

                                    <a class="nav-link" id="tab-7" data-toggle="pill" href="#custom-tabs-three-tab7"
                                        role="tab" aria-controls="custom-tabs-three-tab7" aria-selected="false">
                                        {{__('DESCRIPTION_CONTROL_AREA')}}
                                    </a>

                                </div>
                            </div>
                            <div class="col-7 col-sm-9">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-three-tab1" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab1-tab">

                                        <div class="form-group">
                                            <input type="hidden" name="anaweri_id" value="{{ $anaweri->id }}" />
                                            <label>{{ __('reference_code') }} *</label>
                                            <textarea class="form-control" name="reference_code"
                                                required>{{ $mode === 'create' ? '' : $sakme->reference_code }}</textarea>
                                        </div>
                                        <div class=" form-group">
                                            <label>{{ __('title') }} *</label>
                                            <textarea class="form-control" name="title"
                                                required>{{ $mode === 'create' ? '' : $sakme->title }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('date') }} </label>
                                            <input type="text" class="form-control datePicker" name="date"
                                                value="{{ $mode === 'create' ? '' : $sakme->date }}"
                                                autocomplete="off" />
                                        </div>
                                        <input type="hidden" name="level_of_description" value="საქმე" />

                                        <div class="form-group">
                                            <label>{{ __('extent_and_medium_of_the_unit_of_description') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="extent_and_medium_of_the_unit_of_description">{{ $mode === 'create' ? '' : $sakme->extent_and_medium_of_the_unit_of_description }}</textarea>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab2" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab2-tab">
                                        <div class="form-group">
                                            <label>{{ __('name_of_creator') }} </label>
                                            <textarea class="form-control"
                                                name="name_of_creator">{{ $mode === 'create' ? '' : $sakme->name_of_creator }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('administrative_biographical_history') }} </label>
                                            <textarea class="form-control"
                                                name="administrative_biographical_history">{{ $mode === 'create' ? '' : $sakme->administrative_biographical_history }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('archival_history') }} </label>
                                            <textarea class="form-control"
                                                name="archival_history">{{ $mode === 'create' ? '' : $sakme->archival_history }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('immediate_source_of_acquisition_or_transfer') }} </label>
                                            <textarea class="form-control"
                                                name="immediate_source_of_acquisition_or_transfer">{{ $mode === 'create' ? '' : $sakme->immediate_source_of_acquisition_or_transfer }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab3" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab3-tab">
                                        <div class="form-group">
                                            <label>{{ __('scope_and_content') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="scope_and_content">{{ $mode === 'create' ? '' : $sakme->scope_and_content }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('appraisal_destruction_and_scheduling_information') }} </label>
                                            <textarea class="form-control"
                                                name="appraisal_destruction_and_scheduling_information">{{ $mode === 'create' ? '' : $sakme->appraisal_destruction_and_scheduling_information }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('accruals') }} </label>
                                            <textarea class="form-control"
                                                name="accruals">{{ $mode === 'create' ? '' : $sakme->accruals }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('system_of_arrangement') }} </label>
                                            <textarea class="form-control"
                                                name="system_of_arrangement">{{ $mode === 'create' ? '' : $sakme->system_of_arrangement }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab4" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab4-tab">
                                        <div class="form-group">
                                            <label>{{ __('conditions_governing_access') }} </label>
                                            <textarea class="form-control"
                                                name="conditions_governing_access">{{ $mode === 'create' ? '' : $sakme->conditions_governing_access }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('conditions_governing_reproduction') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="conditions_governing_reproduction">{{ $mode === 'create' ? '' : $sakme->conditions_governing_reproduction }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('language_scripts_of_material') }} </label>
                                            <textarea class="form-control"
                                                name="language_scripts_of_material">{{ $mode === 'create' ? '' : $sakme->language_scripts_of_material }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('physical_characteristics_and_technical_requirements') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="physical_characteristics_and_technical_requirements">{{ $mode === 'create' ? '' : $sakme->physical_characteristics_and_technical_requirements }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('finding_aids') }} </label>
                                            <textarea class="form-control"
                                                name="finding_aids">{{ $mode === 'create' ? '' : $sakme->finding_aids }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab5" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab5-tab">
                                        <div class="form-group">
                                            <label>{{ __('existence_and_location_of_originals') }} </label>
                                            <textarea class="form-control"
                                                name="existence_and_location_of_originals">{{ $mode === 'create' ? '' : $sakme->existence_and_location_of_originals }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('existence_and_location_of_copies') }} </label>
                                            <textarea class="form-control"
                                                name="existence_and_location_of_copies">{{ $mode === 'create' ? '' : $sakme->existence_and_location_of_copies }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('related_units_of_description') }} </label>
                                            <textarea class="form-control"
                                                name="related_units_of_description">{{ $mode === 'create' ? '' : $sakme->related_units_of_description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('publication_note') }} </label>
                                            <textarea class="form-control"
                                                name="publication_note">{{ $mode === 'create' ? '' : $sakme->publication_note }}</textarea>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-three-tab6" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab6-tab">
                                        <div class="form-group">
                                            <label>{{ __('note') }} </label>
                                            <textarea class="form-control"
                                                name="note">{{ $mode === 'create' ? '' : $sakme->note }}</textarea>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-three-tab7" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab7-tab">
                                        <div class="form-group">
                                            <label>{{ __('archivists_note') }} </label>
                                            <textarea class="form-control"
                                                name="archivists_note">{{ $mode === 'create' ? '' : $sakme->archivists_note }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('rules_or_conventions') }} </label>
                                            <textarea class="form-control"
                                                name="rules_or_conventions">{{ $mode === 'create' ? '' : $sakme->rules_or_conventions }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('date_of_descriptions') }} </label>
                                            <textarea class="form-control"
                                                name="date_of_descriptions">{{ $mode === 'create' ? '' : $sakme->date_of_descriptions }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if($mode === 'create')
                        <button type="submit" class="btn btn-primary btn-sm caps">
                            დამატება
                        </button>
                        @else
                        <button type="submit" class="btn btn-primary btn-sm caps">
                            რედაქტირება
                        </button>
                        <button type="button" class="btn btn-danger float-right btn-sm caps"
                            onclick=" document.getElementById('delete-form').submit();">წაშლა</button>
                        @endif
                    </div>
                </div>



            </div>
        </div>
    </section>
</form>


@if($mode === 'edit')
<form id="delete-form" action="{{ route('sakmes.destroy', [$sakme->id]) }}" method="post" style="display:none;">
    <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
</form>
@endif




@endsection
