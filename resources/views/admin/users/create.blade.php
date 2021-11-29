@extends('layouts.admin')

@section('js')
<script>
    $(document).ready(function() {
        $('#usersL').addClass('active');
    });
</script>
<script>
    $('#region_id').change(function() {
            $.ajax({
                url: '/get-states',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    region:$(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.result === 'success'){
                        $('#states').html('');
                        $.each(data.states, function(key, value) {
                            $('#states').append("<option value='"+value.id+"'>"+value.name+"</option>");
                        });
                    }
                }
            });
        });
</script>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">

            <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card card-white ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <b>
                                ახალი მონაცემის დამატება
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
                                        პირადი ნომერი <small>(მათ შორის ბინადრობის მოწმობის N)</small>
                                        <span style="color:red;">*</span>
                                    </label>
                                    <input name="p_number" value="{{ old('p_number') }}" type="number"
                                        class="form-control" required>
                                </div>

                                <div class="form-group col-4">
                                    <label>სახელი <span style="color:red;">*</span> </label>
                                    <input name="fname" value="{{ old('fname') }}" type="text" class="form-control"
                                        required>
                                </div>

                                <div class="form-group col-4">
                                    <label>გვარი <span style="color:red;">*</span> </label>
                                    <input name="lname" value="{{ old('lname') }}" type="text" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-4">
                                    <label>დაბადების თარიღი <span style="color:red;">*</span> </label>
                                    <div class="input-group date">
                                        <input name="b_date" value="{{ old('b_date') }}" type="text"
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
                                    <input name="email" value="{{ old('email') }}" type="email" class="form-control">
                                </div>

                                <div class="form-group col-6">
                                    <label>პაროლი <span style="color:red;">*</span> </label>
                                    <input name="password" type="password" class="form-control" required>
                                </div>

                                <div class="form-group col-1">
                                    <label>პრეფიქსი</label>
                                    <select class="form-control" name="prefix_id">
                                        <option selected disabled>აირჩიეთ</option>
                                        @foreach($prefixes as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-2">
                                    <label>ტელეფონის ნომერი</label>
                                    <input name="tel_number" value="{{ old('tel_number') }}" type="text"
                                        class="form-control">
                                </div>



                                <div class="form-group col-3">
                                    <label>რეგიონი</label>
                                    <select class="form-control" name="region_id" id="region_id">
                                        <option selected disabled>აირჩიეთ</option>

                                        @foreach($regions as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-3">
                                    <label>რაიონი</label>
                                    <select class="form-control" name="state_id" id="states"></select>
                                </div>

                                <div class="form-group col-3">
                                    <label>მისამართი</label>
                                    <input name="address" value="{{ old('address') }}" type="text" class="form-control">
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">დამატება</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</section>
@endsection
