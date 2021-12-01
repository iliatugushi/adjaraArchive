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

            <form method="post" action="{{ route('admins.update', ['admin' => $admin->id]) }}"
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
                            <a href="{{route('admins.index')}}" class="btn  btn-outline-primary btn-xs caps">
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
                                        <input type="hidden" name="admin_id" value="{{$admin->id}}" />
                                        <input type="text" class="form-control" name="name" value="{{$admin->name}}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>ელფოსტა</label>
                                        <input type="text" class="form-control" name="email" value="{{$admin->email}}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>ახალი პაროლი</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>როლი</label>
                                        <select class="form-control" name="role_id" required>
                                            <option selected disabled>აირჩიეთ ... </option>
                                            @foreach($roles as $item)
                                            @if(Auth::guard('admin')->user()->hasRole($item->name))
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                            @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif

                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm caps">დამატება</button>
                        @can('delete admins')
                        <a href="{{ route('admins.destroy', [$admin->id]) }}"
                            class="btn btn-danger float-right btn-xs caps">წაშლა</a>
                        @endcan
                    </div>
                </div>
            </form>




        </div>
    </div>
</section>
@endsection
