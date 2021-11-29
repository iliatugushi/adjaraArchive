@extends('layouts.admin')

@section('js')
<script>
    $(document).ready(function() {
        $('.creatorsDropdowmL').addClass('active');
    });
</script>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">

            <form method="post" action="{{ route('types.update', ['type' => $type->id]) }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card card-white ">
                    <div class="card-header">
                        <h3 class="card-title caps">
                            <b>
                                რედაქტირება
                            </b>
                        </h3>
                        <div class="card-tools">
                            <a href="{{route('types.index')}}" class="btn  btn-outline-primary btn-xs caps">
                                უკან
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-12 pt-3">
                            <div class="row ">
                                <div class="col-8">

                                    <div class="form-group">
                                        <label>დასახელება</label>
                                        <input type="text" class="form-control" name="name" value="{{$type->name}}"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm caps">დამატება</button>

                        <button type="button" class="btn btn-danger float-right btn-sm caps"
                            onclick=" document.getElementById('delete-form').submit();">წაშლა</button>
                    </div>
                </div>
            </form>




        </div>
    </div>

    <form id="delete-form" action="{{ route('types.destroy', [$type->id]) }}" method="post" style="display:none;">
        <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
    </form>
</section>
@endsection
