@extends('layouts.admin')
@section('js')
<script>
    $(document).ready(function() {
       $('.archivesL').addClass('active');
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
                            არქივები
                        </b>
                    </h3>
                    <div class="card-tools">

                        @if(auth()->guard('admin')->user()->can('create_archives'))
                        <a href="{{route('archives.create')}}" class="btn btn-primary btn-sm caps ">
                            დამატება
                        </a>
                        @endif


                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12 pt-3">
                        <table class="table tableData table-hover table-bordered" style="font-size:13px;">
                            <thead class="caps">
                                <tr>
                                    <th scope="col">იდენტიფიკატორი</th>
                                    <th scope="col">დასახელება</th>
                                    <th scope="col">მეგზურები</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($archives as $item)
                                <tr>
                                    <th scope="row" style="width:200px;">{{$item->identifier}}</th>
                                    <th scope="row">{{$item->authorised_form_of_name}}</th>
                                    <th scope="row">
                                        @if($item->megzuri != null)
                                        <a href="{{ asset($item->megzuri) }}" target="_blank"
                                            class="btn btn-danger btn-xs">
                                            PDF
                                        </a>
                                        @endif
                                    </th>
                                    <td>
                                        @if(auth()->guard('admin')->user()->can('edit_archives'))
                                        <a href="{{route('archives.edit', ['archive'=>$item->id])}}"
                                            class="btn btn-primary btn-xs" title='რედაქტირება'>
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        @endif

                                        <a href="{{route('archives.show', ['archive'=>$item->id])}}"
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
