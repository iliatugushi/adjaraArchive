@extends('layouts.admin')
@section('js')
<script>
    $(document).ready(function() {
        $('.administrationL').addClass('active');
    });
</script>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">

            <form method="post" action="{{ route('admins.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card card-white ">
                    <div class="card-header">
                        <h3 class="card-title caps">
                            <b>
                                ახალი მონაცემის დამატება
                            </b>
                        </h3>
                        <div class="card-tools">
                            <a href="{{route('admins.index')}}" class="btn btn-outline-secondary btn-xs caps">
                                უკან
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-12 pt-3">
                            <div class="row ">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>სახელი გვარი</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>ელფოსტა</label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>პაროლი</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>როლი</label>
                                        <select class="form-control" name="role_id" required>
                                            <option selected disabled>აირჩიეთ ... </option>
                                            @foreach($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>
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
