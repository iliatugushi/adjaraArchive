@extends('layouts.admin')

@section('js')
<script>
    $(document).ready(function() {
     $('.creatorsDropdowmL').addClass('active');
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
    action="{{ $mode === 'create' ? route('creators.store') : route('creators.update', ['creator' => $creator->id]) }}"
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
                                <a href="{{route('creators.index')}}">
                                    ფონდშემქმნელები
                                </a>
                                -
                                <span style=" color:#9e9e9e;font-weight:100;">
                                    @if($mode === 'create')
                                    ახალი მონაცემის დამატება
                                    @else
                                    {{ $creator->identifier }} - რედაქტირება
                                    @endif
                                </span>
                            </b>
                        </h3>
                        <div class="card-tools">
                            <a href="{{route('creators.index')}}"
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
                                        {{ __('description_area') }}
                                    </a>
                                    <a class="nav-link" id="custom-tabs-three-tab3-tab" data-toggle="pill"
                                        href="#custom-tabs-three-tab3" role="tab" aria-controls="custom-tabs-three-tab3"
                                        aria-selected="false">
                                        {{ __('RELATIONSHIPS_AREA') }}
                                    </a>
                                    <a class="nav-link" id="tab-4" data-toggle="pill" href="#custom-tabs-three-tab4"
                                        role="tab" aria-controls="custom-tabs-three-tab4" aria-selected="false">
                                        {{__('control_area')}}
                                    </a>

                                    <a class="nav-link" id="tab-5" data-toggle="pill" href="#custom-tabs-three-tab5"
                                        role="tab" aria-controls="custom-tabs-three-tab5" aria-selected="false">
                                        {{__('RELATING_DESCRIPTIONS_OF_INSTITUTIONS')}}
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
                                                required>{{ $mode === 'create' ? '' : $creator->identifier }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('type_of_entity') }} *</label>
                                            <select class="form-control" name="type_id" required>
                                                <option>აირჩიეთ ...</option>
                                                @if($mode === 'edit')
                                                @foreach($types as $item)

                                                <option value="{{ $item->id }}" {{ $item->id === $creator->type_id ?
                                                    'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                                @endforeach
                                                @else

                                                @foreach($types as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class=" form-group">
                                            <label>{{ __('authorised_form_of_name') }} *</label>
                                            <textarea class="form-control" name="authorised_form_of_name"
                                                required>{{ $mode === 'create' ? '' : $creator->authorised_form_of_name }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('parallel_form_of_name') }} </label>
                                            <textarea class="form-control"
                                                name="parallel_form_of_name">{{ $mode === 'create' ? '' : $creator->parallel_form_of_name }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('standardized_forms_of_name_according_to_other_rules') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="standardized_forms_of_name_according_to_other_rules">{{ $mode === 'create' ? '' : $creator->standardized_forms_of_name_according_to_other_rules }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('other_form_of_name') }} </label>
                                            <textarea class="form-control"
                                                name="other_form_of_name">{{ $mode === 'create' ? '' : $creator->other_form_of_name }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('identifiers_for_corporate_bodies') }} </label>
                                            <textarea class="form-control"
                                                name="identifiers_for_corporate_bodies">{{ $mode === 'create' ? '' : $creator->identifiers_for_corporate_bodies }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab2" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab2-tab">
                                        <div class="form-group">
                                            <label>{{ __('dates_of_existence') }} </label>
                                            <textarea class="form-control"
                                                name="dates_of_existence">{{ $mode === 'create' ? '' : $creator->dates_of_existence }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('history') }} </label>
                                            <textarea class="form-control"
                                                name="history">{{ $mode === 'create' ? '' : $creator->history }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('places') }} </label>
                                            <textarea class="form-control"
                                                name="places">{{ $mode === 'create' ? '' : $creator->places }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('legal_status') }} </label>
                                            <textarea class="form-control"
                                                name="legal_status">{{ $mode === 'create' ? '' : $creator->legal_status }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('functions_occupations_and_activities') }} </label>
                                            <textarea class="form-control"
                                                name="functions_occupations_and_activities">{{ $mode === 'create' ? '' : $creator->functions_occupations_and_activities }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('mandates_sources_of_authority') }} </label>
                                            <textarea class="form-control"
                                                name="mandates_sources_of_authority">{{ $mode === 'create' ? '' : $creator->mandates_sources_of_authority }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('internal_structures_genealogy') }} </label>
                                            <textarea class="form-control"
                                                name="internal_structures_genealogy">{{ $mode === 'create' ? '' : $creator->internal_structures_genealogy }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('general_context') }} </label>
                                            <textarea class="form-control"
                                                name="general_context">{{ $mode === 'create' ? '' : $creator->general_context }}</textarea>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab3" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab3-tab">
                                        <div class="form-group">
                                            <label>{{ __('names_identifiers_of_related_corporate_bodies') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="names_identifiers_of_related_corporate_bodies">{{ $mode === 'create' ? '' : $creator->names_identifiers_of_related_corporate_bodies }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('category_of_relationship') }} </label>
                                            <textarea class="form-control"
                                                name="category_of_relationship">{{ $mode === 'create' ? '' : $creator->category_of_relationship }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('description_of_relationship') }} </label>
                                            <textarea class="form-control"
                                                name="description_of_relationship">{{ $mode === 'create' ? '' : $creator->description_of_relationship }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('dates_of_the_relationship') }} </label>
                                            <textarea class="form-control"
                                                name="dates_of_the_relationship">{{ $mode === 'create' ? '' : $creator->dates_of_the_relationship }}</textarea>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab4" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab4-tab">
                                        <div class="form-group">
                                            <label>{{ __('authority_record_identifier') }} </label>
                                            <textarea class="form-control"
                                                name="authority_record_identifier">{{ $mode === 'create' ? '' : $creator->authority_record_identifier }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('institution_identifiers') }}
                                            </label>
                                            <textarea class="form-control"
                                                name="institution_identifiers">{{ $mode === 'create' ? '' : $creator->institution_identifiers }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('rules_and_or_conventions') }} </label>
                                            <textarea class="form-control"
                                                name="rules_and_or_conventions">{{ $mode === 'create' ? '' : $creator->rules_and_or_conventions }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('status') }} </label>
                                            <textarea class="form-control"
                                                name="status">{{ $mode === 'create' ? '' : $creator->status }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('level_of_detail') }} </label>
                                            <textarea class="form-control"
                                                name="level_of_detail">{{ $mode === 'create' ? '' : $creator->level_of_detail }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('dates_of_creationrevision_or_deletion') }} </label>
                                            <textarea class="form-control"
                                                name="dates_of_creationrevision_or_deletion">{{ $mode === 'create' ? '' : $creator->dates_of_creationrevision_or_deletion }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('language_and_script') }} </label>
                                            <textarea class="form-control"
                                                name="language_and_script">{{ $mode === 'create' ? '' : $creator->language_and_script }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('sources') }} </label>
                                            <textarea class="form-control"
                                                name="sources">{{ $mode === 'create' ? '' : $creator->sources }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('maintenance_notes') }} </label>
                                            <textarea class="form-control"
                                                name="maintenance_notes">{{ $mode === 'create' ? '' : $creator->maintenance_notes }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-tab5" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-tab5-tab">
                                        <div class="form-group">
                                            <label>{{ __('identifiers_and_titles_of_related_resources') }} </label>
                                            <textarea class="form-control"
                                                name="identifiers_and_titles_of_related_resources">{{ $mode === 'create' ? '' : $creator->identifiers_and_titles_of_related_resources }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('types_of_related_resources') }} </label>
                                            <textarea class="form-control"
                                                name="types_of_related_resources">{{ $mode === 'create' ? '' : $creator->types_of_related_resources }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('nature_of_relationships') }} </label>
                                            <textarea class="form-control"
                                                name="nature_of_relationships">{{ $mode === 'create' ? '' : $creator->nature_of_relationships }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('dates_of_related_resources_and_or_relationships') }} </label>
                                            <textarea class="form-control"
                                                name="dates_of_related_resources_and_or_relationships">{{ $mode === 'create' ? '' : $creator->dates_of_related_resources_and_or_relationships }}</textarea>
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
<form id="delete-form" action="{{ route('creators.destroy', [$creator->id]) }}" method="post" style="display:none;">
    <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
</form>
@endif




@endsection
