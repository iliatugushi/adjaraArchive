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

            <div class="card card-prirary cardutline direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title caps">
                        <b>
                            ადმინისტრატორები
                        </b>
                    </h3>
                    <div class="card-tools">
                        <a href="{{route('admins.create')}}" class="btn btn-primary btn-sm caps">
                            დამატება
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12 pt-3">
                        <table class="table tableData table-hover table-striped table-bordered" style="font-size:13px;">
                            <thead class="caps">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">სახელი</th>
                                    <th scope="col">ელფოსტა</th>
                                    <th scope="col">როლი</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">სახელი</th>
                                    <th scope="col">ელფოსტა</th>
                                    <th scope="col">როლი</th>
                                </tr>
                            </tfoot>


                            <tbody>
                                @foreach($admins as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <th>{{$item->name}}</th>
                                    <th>{{$item->email}}</th>
                                    <th>{{$item->roles->pluck('name')}}</th>
                                    <td>
                                        <a href="{{route('admins.edit', ['admin'=>$item->id])}}"
                                            class="btn btn-primary btn-xs" title='რედაქტირება'>
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
