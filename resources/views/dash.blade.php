@extends('layouts.app')
@section('main')

    <div class="jumbotron text-center">
        <p>Yeni Link əlavə edin</p>
        {!! Form::open(['url'=>'/result']) !!}
        <div class="col-md-offset-3 col-md-6 input-group">
            {!! Form::url('url',null,['class'=>"form-control",'placeholder'=>'Linki qısaltmaq üçün bura əlavə edin','required']) !!}
            <div class="input-group-btn">
                {!! Form::submit('Qısalt',['class'=>'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        @if(session('del'))
            <div class="col-md-offset-3 col-md-6 alert-info">
                Link Silindi
            </div>
        @endif
        <h2 class="text-center" style="color: white;">Xoş gəlmisiniz {{Auth::user()->name}}</h2>
<table class="table table-responsive text-left">
    <t>
        <th>Link</th>
        <th>Qısa versiya</th>
        <th>Ziyarət sayı</th>
        <th>Ləğv et</th>
    </t>
    @if(!empty($urls))
    @foreach($urls as $url)
    <tr>
        <td>{{$url['url']}}</td>
        <td>{{url($url['shorten'])}}</td>
        <td>{{$url['click_count']}}</td>
        <td><a href="{{url('delete/'.$url['id'])}}"><span class="glyphicon glyphicon-trash"></span> Sil</a></td>
    </tr>
    @endforeach
    @endif
</table>
    </div>
@endsection
@section('css')@endsection
@section('js')@endsection