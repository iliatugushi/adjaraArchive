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
        <div class="col-3" style="background-color:white;">
            <div id="tree" style="padding:20px;">
                <div class="form-group">
                    <input id="liveSearch" type="text" class="form-control" placeholder="ძებნა..."
                        style="font-size:12px;">
                </div>
                <ul class="caps">

                    <li>
                        <span class=" treeElement" element="Anaweri" elementID="{{ $anaweri->id }}">
                            <i class="fas fa-layer-group"></i>
                            {{ $anaweri->name }}
                        </span>
                        <ul class="active">
                            @foreach($anaweri->sakmesTree as $sakme)
                            <li>
                                <span class="caret treeElement" element="Sakme" elementID="{{ $sakme->id }}">
                                    <i class="far fa-folder"></i>
                                    {{ $sakme->name }}
                                </span>
                                <ul class="nested">
                                    @foreach($sakme->filesTree as $file)
                                    <li>
                                        <span class="treeElement" element="File" elementID="{{ $file->id }}">
                                            <i class="far fa-file"></i>
                                            {{ $file->name }}
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-9">

            <div class="card card-white " id="contentBox">
                @include('admin.anaweris.show_component')


            </div>



        </div>
    </div>
</section>






@endsection
