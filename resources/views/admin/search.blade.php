@extends('layouts.admin')
@section('title')
<title>მთავარი</title>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('.searchL').addClass('active');
    });
</script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    Search
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
