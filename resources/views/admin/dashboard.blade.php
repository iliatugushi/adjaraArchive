@extends('layouts.admin')
@section('title')
<title>მთავარი</title>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('.dashboardL').addClass('active');
    });
</script>
@endsection

@section('css')
<style>
    html,
    body,
    samp {
        font-family: 'FiraGO';
    }

    .bg_pic::before {
        content: "";
        background-image: url('images/pic_22.jpg');
        background-size: contain;
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        opacity: 0.15;
    }
</style>
@endsection
@section('content')
<div class="container bg_pic">
    <div class="row justify-content-center">

      

    </div>
</div>
@endsection
