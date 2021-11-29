@extends('layouts.admin')
@section('js')
<script>
    $(document).ready(function() {
        $('.treeL').addClass('active');
    });
</script>
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
                            <i class="fas fa-archive nav-icon"></i>
                            <p>
                                {{ $archive->name }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        </ul>
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
