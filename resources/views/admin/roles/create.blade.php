@extends('layouts.admin')

@section('js')
<script>
    $(document).ready(function() {
     $('.rolesL').addClass('active');
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
    action="{{ $mode === 'create' ? route('roles.store') : route('roles.update', ['role' => $role->id]) }}"
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
                                <a href="{{route('roles.index')}}">
                                    როლი
                                </a>
                                -
                                <span style=" color:#9e9e9e;font-weight:100;">
                                    @if($mode === 'create')
                                    ახალი მონაცემის დამატება
                                    @else
                                    {{ $role->name }} - რედაქტირება
                                    @endif
                                </span>
                            </b>
                        </h3>
                        <div class="card-tools">
                            <a href="{{route('roles.index')}}" class="btn btn-block btn-outline-secondary btn-xs caps">
                                უკან
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-12 row">
                            <div class="form-group col-12">
                                <label class="caps">როლის დასახელება </label>
                                <input class="form-control" name="name"
                                    value="{{ $mode === 'create' ? '' : $role->name }}" />
                            </div>
                            <div class="col-3" style="margin-bottom:10px;">
                                <div style="border:solid 1px #ebebeb;border-radius:20px;padding:10px;">
                                    <p class="caps">ადმინისტრატორები</p>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="create_admins">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="create_admins" {{
                                            $role->hasPermissionTo('create_admins') ? 'checked' : '' }}>
                                        @endif
                                        <label class="form-check-label">დამატება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="edit_admins">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="edit_admins" {{
                                            $role->hasPermissionTo('edit_admins') ? 'checked' : '' }}>
                                        @endif

                                        <label class="form-check-label">რედაქტირება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="delete_admins">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="delete_admins" {{
                                            $role->hasPermissionTo('delete_admins') ? 'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">წაშლა</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="view_admins">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="view_admins" {{
                                            $role->hasPermissionTo('view_admins') ? 'checked' : '' }}>
                                        @endif
                                        <label class="form-check-label">ნახვა</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3" style="margin-bottom:10px;">
                                <div style="border:solid 1px #ebebeb;border-radius:20px;padding:10px;">
                                    <p class="caps">არქივები</p>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="create_archives" }>
                                        @else
                                        <input class="form-check-input" type="checkbox" name="create_archives" {{
                                            $role->hasPermissionTo('create_archives') ? 'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">დამატება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="edit_archives">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="edit_archives" {{
                                            $role->hasPermissionTo('edit_archives') ? 'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">რედაქტირება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="delete_archives">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="delete_archives" {{
                                            $role->hasPermissionTo('delete_archives') ? 'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">წაშლა</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="view_archives">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="view_archives" {{
                                            $role->hasPermissionTo('view_archives') ? 'checked' : '' }}>
                                        @endif
                                        <label class="form-check-label">ნახვა</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3" style="margin-bottom:10px;">
                                <div style="border:solid 1px #ebebeb;border-radius:20px;padding:10px;">
                                    <p class="caps">ფონდშემქმნელები</p>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="create_creators">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="create_creators" {{
                                            $role->hasPermissionTo('create_creators') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">დამატება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="edit_creators">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="edit_creators" {{
                                            $role->hasPermissionTo('edit_creators') ? 'checked' : '' }}>
                                        @endif
                                        <label class="form-check-label">რედაქტირება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="delete_creators">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="delete_creators" {{
                                            $role->hasPermissionTo('delete_creators') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">წაშლა</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="view_creators">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="view_creators" {{
                                            $role->hasPermissionTo('view_creators') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">ნახვა</label>
                                    </div>
                                </div>
                            </div>



                            <div class="col-3" style="margin-bottom:10px;">
                                <div style="border:solid 1px #ebebeb;border-radius:20px;padding:10px;">
                                    <p class="caps">ფონდები</p>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="create_fonds">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="create_fonds" {{
                                            $role->hasPermissionTo('create_fonds') ? 'checked' : '' }}>
                                        @endif

                                        <label class="form-check-label">დამატება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="edit_fonds">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="edit_fonds" {{
                                            $role->hasPermissionTo('edit_fonds') ? 'checked' : '' }}>
                                        @endif

                                        <label class="form-check-label">რედაქტირება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="delete_fonds">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="delete_fonds" {{
                                            $role->hasPermissionTo('delete_fonds') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">წაშლა</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="view_fonds">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="view_fonds" {{
                                            $role->hasPermissionTo('view_fonds') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">ნახვა</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3" style="margin-bottom:10px;">
                                <div style="border:solid 1px #ebebeb;border-radius:20px;padding:10px;">
                                    <p class="caps">ანაწერები</p>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="create_anaweris">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="create_anaweris" {{
                                            $role->hasPermissionTo('create_anaweris') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">დამატება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="edit_anaweris">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="edit_anaweris" {{
                                            $role->hasPermissionTo('edit_anaweris') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">რედაქტირება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="delete_anaweris">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="delete_anaweris" {{
                                            $role->hasPermissionTo('delete_anaweris') ? 'checked' : '' }}>
                                        @endif
                                        <label class="form-check-label">წაშლა</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="view_anaweris">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="view_anaweris" {{
                                            $role->hasPermissionTo('view_anaweris') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">ნახვა</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3" style="margin-bottom:10px;">
                                <div style="border:solid 1px #ebebeb;border-radius:20px;padding:10px;">
                                    <p class="caps">საქმეები</p>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="create_sakmes">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="create_sakmes" {{
                                            $role->hasPermissionTo('create_sakmes') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">დამატება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="edit_sakmes">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="edit_sakmes" {{
                                            $role->hasPermissionTo('edit_sakmes') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">რედაქტირება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="delete_sakmes">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="delete_sakmes" {{
                                            $role->hasPermissionTo('delete_sakmes') ? 'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">წაშლა</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="view_sakmes">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="view_sakmes" {{
                                            $role->hasPermissionTo('view_sakmes') ? 'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">ნახვა</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3" style="margin-bottom:10px;">
                                <div style="border:solid 1px #ebebeb;border-radius:20px;padding:10px;">
                                    <p class="caps">ფაილები</p>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="create_files">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="create_files" {{
                                            $role->hasPermissionTo('create_files') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">დამატება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="edit_files">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="edit_files" {{
                                            $role->hasPermissionTo('edit_files') ? 'checked': '' }}>
                                        @endif
                                        <label class="form-check-label">რედაქტირება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="delete_files">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="delete_files" {{
                                            $role->hasPermissionTo('delete_files') ?
                                        'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">წაშლა</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="view_files">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="view_files" {{
                                            $role->hasPermissionTo('view_files') ? 'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">ნახვა</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3" style="margin-bottom:10px;">
                                <div style="border:solid 1px #ebebeb;border-radius:20px;padding:10px;">
                                    <p class="caps">როლები</p>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="create_roles">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="create_roles" {{
                                            $role->hasPermissionTo('create_roles') ? 'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">დამატება</label>
                                    </div>
                                    <div class="form-check ">
                                        @if($mode === 'create')
                                        <input class="form-check-input" type="checkbox" name="edit_roles">
                                        @else
                                        <input class="form-check-input" type="checkbox" name="edit_roles" {{
                                            $role->hasPermissionTo('edit_roles') ? 'checked': '' }}>
                                        @endif

                                        <label class="form-check-label">რედაქტირება</label>
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
<form id="delete-form" action="{{ route('roles.destroy', [$role->id]) }}" method="post" style="display:none;">
    <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
</form>
@endif




@endsection
