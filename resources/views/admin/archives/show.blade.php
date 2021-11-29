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

            <div class="card card-white ">
                <div class="card-header">
                    <h3 class="card-title" style="font-size:13px;">
                        <a href="{{route('archives.index')}}" class="caps">
                            არქივები
                        </a>
                        /
                        <b>

                            <span style="color:#9e9e9e;font-weight:100;">
                                {{ $archive->authorised_form_of_name  }}
                            </span>
                        </b>
                    </h3>
                </div>


                <div class="card-body">
                    @include('admin.archives.show_component')
                </div>

            </div>



        </div>
    </div>
</section>






@endsection
