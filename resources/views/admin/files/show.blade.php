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
    .showTitle {
        font-size: 13px !important;
    }

    .showValue {
        font-size: 13px;
    }

    .sectionTitle {
        font-size: 16px;
    }
</style>
@endsection
@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-white " id="contentBox">
                @include('admin.files.show_component')
            </div>
        </div>
    </div>
</section>






@endsection
