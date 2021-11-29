@extends('layouts.admin')

@section('js')
<script>
    $(document).ready(function() {
        $('#usersL').addClass('active');
    });
</script>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">

            <div class="card card-prirary cardutline direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <b>
                            მომხმარებლები
                        </b>
                    </h3>
                    <div class="card-tools">
                        <a href="{{route('users.create')}}" class="btn btn-primary ">
                            ახალი მონაცემის დამატება
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12 pt-3">
                        <table class="table tableData table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">სახელი</th>
                                    <th scope="col">გვარი</th>
                                    <th scope="col">ელფოსტა</th>
                                    <th scope="col">დაბ</th>
                                    <th scope="col">პირადი N</th>
                                    <th scope="col">ტელეფონი</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">სახელი</th>
                                    <th scope="col">გვარი</th>
                                    <th scope="col">ელფოსტა</th>
                                    <th scope="col">დაბ</th>
                                    <th scope="col">პირადი N</th>
                                    <th scope="col">ტელეფონი</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($users as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <th>{{$item->fname}}</th>
                                    <th>{{$item->lname}}</th>
                                    <th>{{$item->email}}</th>
                                    <th>{{$item->b_date}}</th>
                                    <th>{{$item->p_number}}</th>
                                    <th>{{$item->tel_number}}</th>
                                    <td>
                                        <a href="{{route('users.edit', ['user'=>$item->id])}}"
                                            class="btn btn-primary btn-sm" title="რედაქტირება">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
