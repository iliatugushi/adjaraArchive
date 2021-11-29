@extends('layouts.admin')
@section('js')
<script>
    $(document).ready(function() {
       $('.objectsL').addClass('active');
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
                            {{ $sakme->anaweri->fond->name }} - {{ $sakme->anaweri->name }} -
                            {{ $sakme->name }} -
                            ფაილი
                        </b>
                    </h3>
                    <div class="card-tools">
                        <a href="{{route('files.create', ['sakme' => $sakme->id])}}"
                            class="btn btn-primary btn-sm caps ">
                            დამატება
                        </a>
                        <a href="{{route('sakmes.index', ['anaweri' => $sakme->anaweri->id])}}"
                            class="btn  btn-sm caps btn-outline-secondary">
                            უკან
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
                                    <th scope="col">საქმე</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($files as $item)
                                <tr>
                                    <th scope="row" style="width:200px;">{{$item->reference_code}}</th>
                                    <th scope="row">{{$item->title}}</th>
                                    <th scope="row">
                                        <a href="{{ route('sakmes.show', ['sakme' => $item->sakme->id]) }}">
                                            {{$item->sakme->title}}
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{route('files.edit', ['file'=>$item->id])}}"
                                            class="btn btn-primary btn-xs" title='რედაქტირება'>
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('files.show', ['file'=>$item->id])}}"
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
