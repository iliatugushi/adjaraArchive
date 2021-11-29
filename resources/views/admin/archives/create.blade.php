@extends('layouts.admin')

@section('js')
<script>
    $(document).ready(function() {
     $('.archivesL').addClass('active');
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

    label {
        font-size: 13px;
    }
</style>
@endsection
@section('content')
<form method="post"
    action="{{ $mode === 'create' ? route('archives.store') : route('archives.update', ['archive' => $archive->id]) }}"
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
                                <a href="{{route('archives.index')}}">
                                    არქივები
                                </a>
                                -
                                <span style=" color:#9e9e9e;font-weight:100;">
                                    @if($mode === 'create')
                                    ახალი მონაცემის დამატება
                                    @else
                                    {{ $archive->identifier }} - რედაქტირება
                                    @endif
                                </span>
                            </b>
                        </h3>
                        <div class="card-tools">
                            <a href="{{route('archives.index')}}"
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
                                        {{ __('contact_area') }}
                                    </a>
                                    <a class="nav-link" id="custom-tabs-three-tab3-tab" data-toggle="pill"
                                        href="#custom-tabs-three-tab3" role="tab" aria-controls="custom-tabs-three-tab3"
                                        aria-selected="false">
                                        {{ __('description_area') }}
                                    </a>
                                    <a class="nav-link" id="custom-tabs-three-tab4-tab" data-toggle="pill"
                                        href="#custom-tabs-three-tab4" role="tab" aria-controls="custom-tabs-three-tab4"
                                        aria-selected="false">
                                        {{__('access_area')}}
                                    </a>
                                    <a class="nav-link" id="custom-tabs-three-tab5-tab" data-toggle="pill"
                                        href="#custom-tabs-three-tab5" role="tab" aria-controls="custom-tabs-three-tab5"
                                        aria-selected="false">
                                        {{__('services_area')}}
                                    </a>
                                    <a class="nav-link" id="tab-6" data-toggle="pill" href="#custom-tabs-three-tab6"
                                        role="tab" aria-controls="custom-tabs-three-tab6" aria-selected="false">
                                        {{__('control_area')}}
                                    </a>
                                    <a class="nav-link" id="tab-7" data-toggle="pill" href="#custom-tabs-three-tab7"
                                        role="tab" aria-controls="custom-tabs-three-tab7" aria-selected="false">
                                        {{__('RELATING_DESCRIPTIONS_OF_INSTITUTIONS')}}
                                    </a>
                                    <a class="nav-link" id="tab-8" data-toggle="pill" href="#custom-tabs-three-tab8"
                                        role="tab" aria-controls="custom-tabs-three-tab8" aria-selected="false">
                                        {{__('megzuri')}}
                                    </a>
                                </div>
                            </div>
                            <div class="col-7 col-sm-9">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-three-tab1" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab1-tab">
                                        <div class="form-group">
                                            <label>{{ __('identifier') }} *</label>
                                            <textarea class="form-control" name="identifier"
                                                required>{{ $mode === 'create' ? '' : $archive->identifier }}</textarea>
                                        </div>
                                        <div class=" form-group">
                                            <label>{{ __('authorised_form_of_name') }} *</label>
                                            <textarea class="form-control" name="authorised_form_of_name"
                                                required>{{ $mode === 'create' ? '' : $archive->authorised_form_of_name }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('parallel_form_of_name') }} </label>
                                            <textarea class="form-control"
                                                name="parallel_form_of_name">{{ $mode === 'create' ? '' : $archive->parallel_form_of_name }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('other_form_of_name') }} </label>
                                            <textarea class="form-control"
                                                name="other_form_of_name">{{ $mode === 'create' ? '' : $archive->other_form_of_name }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('type_of_institution_with_archival_holdings') }} </label>
                                            <textarea class="form-control"
                                                name="type_of_institution_with_archival_holdings">{{ $mode === 'create' ? '' : $archive->type_of_institution_with_archival_holdings }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab2" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab2-tab">
                                        <div class="form-group">
                                            <label>{{ __('location_and_address') }}</label>
                                            <textarea class="form-control"
                                                name="location_and_address">{{ $mode === 'create' ? '' : $archive->location_and_address }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('telephone_fax_email') }} </label>
                                            <textarea class="form-control"
                                                name="telephone_fax_email">{{ $mode === 'create' ? '' : $archive->telephone_fax_email }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('contact_persons') }} </label>
                                            <textarea class="form-control"
                                                name="contact_persons">{{ $mode === 'create' ? '' : $archive->contact_persons }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab3" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab3-tab">
                                        <div class="form-group">
                                            <label>{{ __('history_of_the_institution_with_archival_holdings') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="history_of_the_institution_with_archival_holdings">{{ $mode === 'create' ? '' : $archive->history_of_the_institution_with_archival_holdings }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('geographical_and_cultural_context') }} </label>
                                            <textarea class="form-control"
                                                name="geographical_and_cultural_context">{{ $mode === 'create' ? '' : $archive->geographical_and_cultural_context }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('mandates_sources_of_authority') }} </label>
                                            <textarea class="form-control"
                                                name="mandates_sources_of_authority">{{ $mode === 'create' ? '' : $archive->mandates_sources_of_authority }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('administrative_structure') }} </label>
                                            <textarea class="form-control"
                                                name="administrative_structure">{{ $mode === 'create' ? '' : $archive->administrative_structure }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('records_management_and_collecting_policies') }} </label>
                                            <textarea class="form-control"
                                                name="records_management_and_collecting_policies">{{ $mode === 'create' ? '' : $archive->records_management_and_collecting_policies }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('building') }} </label>
                                            <textarea class="form-control"
                                                name="building">{{ $mode === 'create' ? '' : $archive->building }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('archival_and_other_holdings') }} </label>
                                            <textarea class="form-control"
                                                name="archival_and_other_holdings">{{ $mode === 'create' ? '' : $archive->archival_and_other_holdings }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('finding_aids_guides_and_publications') }} </label>
                                            <textarea class="form-control"
                                                name="finding_aids_guides_and_publications">{{ $mode === 'create' ? '' : $archive->finding_aids_guides_and_publications }}</textarea>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab4" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab4-tab">
                                        <div class="form-group">
                                            <label>{{ __('opening_times') }} </label>
                                            <textarea class="form-control"
                                                name="opening_times">{{ $mode === 'create' ? '' : $archive->opening_times }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('conditions_and_requirements_for_access_and_use') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="conditions_and_requirements_for_access_and_use">{{ $mode === 'create' ? '' : $archive->conditions_and_requirements_for_access_and_use }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('accessibility') }} </label>
                                            <textarea class="form-control"
                                                name="accessibility">{{ $mode === 'create' ? '' : $archive->accessibility }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab5" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab5-tab">
                                        <div class="form-group">
                                            <label>{{ __('research_services') }} </label>
                                            <textarea class="form-control"
                                                name="research_services">{{ $mode === 'create' ? '' : $archive->research_services }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('reproduction_services') }} </label>
                                            <textarea class="form-control"
                                                name="reproduction_services">{{ $mode === 'create' ? '' : $archive->reproduction_services }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('public_areas') }} </label>
                                            <textarea class="form-control"
                                                name="public_areas">{{ $mode === 'create' ? '' : $archive->public_areas }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab6" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab6-tab">
                                        <div class="form-group">
                                            <label>{{ __('description_identifier') }} </label>
                                            <textarea class="form-control"
                                                name="description_identifier">{{ $mode === 'create' ? '' : $archive->description_identifier }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('institution_identifier') }} </label>
                                            <textarea class="form-control"
                                                name="institution_identifier">{{ $mode === 'create' ? '' : $archive->institution_identifier }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('rules_and_or_conventions_used') }} </label>
                                            <textarea class="form-control"
                                                name="rules_and_or_conventions_used">{{ $mode === 'create' ? '' : $archive->rules_and_or_conventions_used }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('status') }} </label>
                                            <textarea class="form-control"
                                                name="status">{{ $mode === 'create' ? '' : $archive->status }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('level_of_detail') }} </label>
                                            <textarea class="form-control"
                                                name="level_of_detail">{{ $mode === 'create' ? '' : $archive->level_of_detail }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('dates_of_creation_revision_or_deletion') }} </label>
                                            <textarea class="form-control"
                                                name="dates_of_creation_revision_or_deletion">{{ $mode === 'create' ? '' : $archive->dates_of_creation_revision_or_deletion }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('language_and_script') }} </label>
                                            <textarea class="form-control"
                                                name="language_and_script">{{ $mode === 'create' ? '' : $archive->language_and_script }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('sources') }} </label>
                                            <textarea class="form-control"
                                                name="sources">{{ $mode === 'create' ? '' : $archive->sources }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('maintenance_notes') }} </label>
                                            <textarea class="form-control"
                                                name="maintenance_notes">{{ $mode === 'create' ? '' : $archive->maintenance_notes }}</textarea>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="custom-tabs-three-tab7" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab7-tab">
                                        <div class="form-group">
                                            <label>{{ __('title_and_identifier_of_related_archival_material') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="title_and_identifier_of_related_archival_material">{{ $mode === 'create' ? '' : $archive->title_and_identifier_of_related_archival_material }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('description_of_relationship') }} </label>
                                            <textarea class="form-control"
                                                name="description_of_relationship">{{ $mode === 'create' ? '' : $archive->description_of_relationship }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('dates_of_relationship') }} </label>
                                            <textarea class="form-control"
                                                name="dates_of_relationship">{{ $mode === 'create' ? '' : $archive->dates_of_relationship }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('authorised_name_and_authority_record') }} </label>
                                            <textarea class="form-control"
                                                name="authorised_name_and_authority_record">{{ $mode === 'create' ? '' : $archive->authorised_name_and_authority_record }}</textarea>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-three-tab8" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab8-tab">

                                        @if($mode === 'create')
                                        <div class="form-group">
                                            <label>აირჩიეთ ფაილი (PDF) </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">აირჩიეთ</label>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label>ატვირთული ფაილი</label><br>
                                            <a href="{{ asset($archive->megzuri) }}" target="_blank"
                                                class="btn btn-primary btn-sm">
                                                PDF
                                            </a>
                                        </div>
                                        <div class="form-group">
                                            <label>ახალი ფაილი (PDF) </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">აირჩიეთ</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endif





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
<form id="delete-form" action="{{ route('archives.destroy', [$archive->id]) }}" method="post" style="display:none;">
    <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
</form>
@endif




@endsection
