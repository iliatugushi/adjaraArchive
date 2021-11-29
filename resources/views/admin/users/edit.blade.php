@extends('layouts.admin')
@section('js')
<script>
    $(document).ready(function() {
        $('#usersL').addClass('active');


        let state_id = $('#hidden_user_state').attr('value');
        let region_id = $('#hidden_user_region').attr('value');
        getStates(region_id);

        $('#region_id').change(function() {
            getStates($(this).val());
        });


    function getStates(region){
            $.ajax({
                url: '/get-states',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    region:region
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.result === 'success'){
                        $('#states').html('');
                        $.each(data.states, function(key, value) {
                            if(value.id === state_id){
                                $('#states').append("<option value='"+value.id+"' selected>"+value.name+"</option>");
                            }
                            else{
                                $('#states').append("<option value='"+value.id+"'>"+value.name+"</option>");
                            }

                        });
                    }
                }
            });
    }

    });
</script>

@endsection
@section('content')
<div id="hidden_user_region" value={{ $user->region_id}} style="display:none;"></div>
<div id="hidden_user_state" value={{ $user->state_id}} style="display:none;"></div>
<section class="content">
    <div class="row">
        <div class="col-12">

            <form method="post" action="{{ route('users.update', ['user' => $user->id]) }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="card card-white ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <b>
                                რედაქტირება
                            </b>
                        </h3>
                        <div class="card-tools">
                            <a href="{{route('users.index')}}" class="btn  btn-outline-primary">
                                უკან
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-12 pt-3">
                            <div class="row ">

                                <div class="form-group col-12">
                                    <label>
                                        პირადი ნომერი
                                    </label>
                                    <input name="p_number" value="{{ $user->p_number }}" type="number"
                                        class="form-control" required>
                                </div>

                                <div class="form-group col-4">
                                    <label>სახელი </label>
                                    <input name="fname" value="{{ $user->fname }}" type="text" class="form-control"
                                        required>
                                </div>

                                <div class="form-group col-4">
                                    <label>გვარი </label>
                                    <input name="lname" value="{{ $user->lname }}" type="text" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-4">
                                    <label>დაბადების თარიღი </label>
                                    <div class="input-group date">
                                        <input name="b_date" value="{{ $user->b_date }}" type="text"
                                            class="form-control datePicker" autocomplete="off" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label>ელფოსტა</label>
                                    <input name="email" value="{{ $user->email }}" type="email" class="form-control">
                                </div>

                                <div class="form-group col-6">
                                    <label>ახალი პაროლი </label>
                                    <input name="password" type="password" class="form-control">
                                </div>

                                <div class="form-group col-1">
                                    <label>პრეფიქსი</label>
                                    <select class="form-control" name="prefix_id">
                                        @foreach($prefixes as $item)
                                        @if($user->prefix_id == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-2">
                                    <label>ტელეფონის ნომერი</label>
                                    <input name="tel_number" value="{{ $user->tel_number }}" type="text"
                                        class="form-control">
                                </div>



                                <div class="form-group col-3">
                                    <label>რეგიონი</label>
                                    <select class="form-control" name="region_id" id="region_id">
                                        @foreach($regions as $item)
                                        @if($user->region_id === $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-3">
                                    <label>რაიონი</label>
                                    <select class="form-control" name="state_id" id="states">
                                    </select>
                                </div>

                                <div class="form-group col-3">
                                    <label>მისამართი</label>
                                    <input name="address" value="{{ $user->address }}" type="text" class="form-control">
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">რედაქტირება</button>
                        <button type="button" class="btn btn-danger float-right"
                            onclick=" document.getElementById('delete-form').submit();">წაშლა</button>
                    </div>
                </div>
            </form>

            <form id="delete-form" action="{{ route('users.destroy', [$user->id]) }}" method="post"
                style="display:none;">
                <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
            </form>


        </div>
    </div>
</section>
@endsection
