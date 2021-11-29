@extends('layouts.admin')



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

    #tree ul li {
        padding-left: 8px;
        font-size: 12px;
    }

    #tree {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    #tree i {
        font-size: 12px;
    }
</style>
@endsection
@section('content')

<section class="content">
    <div class="row">
        <div class="col-3" style="background-color:white;">
            <div id="tree" style="padding-left:0px;">

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" style="padding:0px;">
                    @foreach($archives as $archive)
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link treeElement" openState="closed" element="Archive"
                            elementID="{{ $archive->id }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                {{ $archive->name }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @if(!empty($archive->creatorsTree))
                        <ul class="nav nav-treeview">
                            @foreach($archive->creatorsTree as $creator)
                            @if(empty($creator->fondsTree))
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link treeElement" openState="closed"
                                    element="Creator" elementID="{{ $creator->id }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $creator->name }}</p>
                                </a>
                            </li>
                            @else

                            <li class="nav-item ">
                                <a href="javascript:void(0)" class="nav-link treeElement" openState="closed"
                                    element="Creator" elementID="{{ $creator->id }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        <p>{{ $creator->name }}</p>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @foreach($creator->fondsTree as $fond)
                                    @if(empty($fond->anawerisTree))
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" class="nav-link treeElement" openState="closed"
                                            element="Fond" elementID="{{ $fond->id }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ $fond->name }}</p>
                                        </a>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" class="nav-link treeElement" openState="closed"
                                            element="Fond" elementID="{{ $fond->id }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                <p>{{ $fond->name }}</p>
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            @foreach($fond->anawerisTree as $anaweri)

                                            @if(empty($anaweri->sakmesTree))
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link treeElement"
                                                    openState="closed" element="Anaweri" elementID="{{ $anaweri->id }}">
                                                    <p>{{ $anaweri->name }}</p>
                                                </a>
                                            </li>
                                            @else
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link treeElement"
                                                    openState="closed" element="Anaweri" elementID="{{ $anaweri->id }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>
                                                        {{ $anaweri->name }}
                                                        <i class="right fas fa-angle-left"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    @foreach($anaweri->sakmesTree as $sakme)
                                                    @if(empty($sakme->filesTree))
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0)" class="nav-link treeElement"
                                                            openState="closed" element="Sakme"
                                                            elementID="{{ $sakme->id }}">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>{{ $sakme->name }}</p>
                                                        </a>
                                                    </li>
                                                    @else
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0)" class="nav-link treeElement"
                                                            openState="closed" element="Sakme"
                                                            elementID="{{ $sakme->id }}">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>
                                                                <p>{{ $sakme->name }}</p>
                                                                <i class="right fas fa-angle-left"></i>
                                                            </p>
                                                        </a>
                                                        <ul class="nav nav-treeview">
                                                            @foreach($sakme->filesTree as $file)
                                                            <li class="nav-item">
                                                                <a href="javascript:void(0)"
                                                                    class="nav-link treeElement" openState="closed"
                                                                    element="File" elementID="{{ $file->id }}">
                                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                                    <p>{{ $file->name }}</p>
                                                                </a>
                                                            </li>
                                                            @endforeach

                                                        </ul>
                                                    </li>
                                                    @endif
                                                    @endforeach

                                                </ul>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach

                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-9">
            <div style="padding:20px; background-color:white;" id="contentBox">

            </div>

        </div>
    </div>
</section>






@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('.archivesL').addClass('active');

        $('.treeElement').click(function(){

            let element = $(this).attr('element');
            let elementID = $(this).attr('elementID');
            let openState = $(this).attr('openState');

            if(openState === 'closed'){
                // Open
                $(this).attr('openState', 'open');
                treeUpdate(element, elementID);
            }
            else{
                // Close
                $(this).attr('openState', 'closed');
            }

            getContent(element, elementID);
        });
    });

    function treeUpdate(element, elementID){

        console.log(element);
        console.log(elementID);
    }

    function getContent(element, elementID) {
        $_token = "{{ csrf_token() }}";
        $.ajax({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            url: "/admin/element-details",
            type: 'POST',
            cache: false,
            data: {
                'model': element,
                'modelID': elementID,
                '_token': $_token
            }, //see the $_token
            datatype: 'html',
            beforeSend: function() {
                //something before send
                console.log('loading');
                $('#contentBox').html('<div class="d-flex justify-content-center"> <div class="spinner-border text-primary" role="status"> </div></div>');

            },
            success: function(data) {
                $('#contentBox').html(data.html);
            },
            error: function(xhr,textStatus,thrownError) {
                alert(xhr + "\n" + textStatus + "\n" + thrownError);
            }
        });
    }
</script>
@endsection
