@extends('layouts.admin')
@section('js')
<script>
    $(document).ready(function() {
       $('.rolesL').addClass('active');
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
                            როლები
                        </b>
                    </h3>
                    <div class="card-tools">
                        <a href="{{route('roles.create')}}" class="btn btn-primary btn-sm caps ">
                            დამატება
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12 pt-3">
                        <table class="table tableData table-hover table-bordered" style="font-size:13px;">
                            <thead class="caps">
                                <tr>
                                    <th scope="col">დასახელება</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($roles as $item)
                                <tr>
                                    <th scope="row">{{$item->name}}</th>
                                    <td>
                                        <a href="{{route('roles.edit', ['role'=>$item->id])}}"
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
