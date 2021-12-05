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
                            ფონდები
                        </b>
                    </h3>
                    <div class="card-tools">
                        <a href="{{route('fonds.create')}}" class="btn btn-primary btn-sm caps ">
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
                                    <th scope="col">ფონდშემქმნელი</th>
                                    <th scope="col">არქივი</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($fonds as $item)
                                <tr>
                                    <th scope="row" style="width:200px;">{{$item->IdentifikatorClean}}</th>
                                    <th scope="row">{{$item->title}}</th>
                                    <th scope="row">
                                        <a href="{{ route('creators.show', ['creator' => $item->creator->id]) }}">
                                            {{$item->creator->name}}
                                        </a>
                                    </th>
                                    <th scope="row">
                                        <a href="{{ route('archives.show', ['archive' => $item->archive->id]) }}">
                                            {{$item->archive->name}}
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{route('fonds.edit', ['fond'=>$item->id])}}"
                                            class="btn btn-primary btn-xs" title='რედაქტირება'>
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('fonds.show', ['fond'=>$item->id])}}"
                                            class="btn btn-secondary btn-xs" title='ნახვა'>
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('anaweris.index', ['fond'=>$item->id])}}"
                                            class="btn btn-secondary btn-xs caps">
                                            ანაწერები
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
