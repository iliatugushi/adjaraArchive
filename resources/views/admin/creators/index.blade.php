@extends('layouts.admin')
@section('js')
<script>
    $(document).ready(function() {
       $('.creatorsDropdowmL').addClass('active');
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
                            ფონდშემქმნელები
                        </b>
                    </h3>
                    <div class="card-tools">
                        <a href="{{route('creators.create')}}" class="btn btn-primary btn-sm caps ">
                            დამატება
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12 pt-3">
                        <table class="table tableData table-hover table-bordered" style="font-size:13px;">
                            <thead class="caps">
                                <tr>
                                    <th scope="col">იდენტიფიკატორი</th>
                                    <th scope="col">დასახელება</th>
                                    <th scope="col">ტიპი</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tfoot class="caps">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($creators as $item)
                                <tr>
                                    <th scope="row" style="width:200px;">{{$item->identifier}}</th>
                                    <th scope="row">{{$item->name}}</th>
                                    <th scope="row">{{$item->type->name}}</th>
                                    <td>
                                        <a href="{{route('creators.edit', ['creator'=>$item->id])}}"
                                            class="btn btn-primary btn-xs" title='რედაქტირება'>
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('creators.show', ['creator'=>$item->id])}}"
                                            class="btn btn-secondary btn-xs" title='ნახვა'>
                                            <i class="fas fa-eye"></i>
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
