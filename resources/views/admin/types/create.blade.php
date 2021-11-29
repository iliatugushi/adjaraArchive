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

            <form method="post" action="{{ route('types.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card card-white ">
                    <div class="card-header">
                        <h3 class="card-title caps">
                            <b>
                                ახალი მონაცემის დამატება
                            </b>
                        </h3>
                        <div class="card-tools">
                            <a href="{{route('types.index')}}" class="btn btn-outline-secondary btn-xs caps">
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
                                        <input type="text" class="form-control" name="name" required>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary caps btn-sm">დამატება</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</section>
@endsection
