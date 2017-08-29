@extends('layouts.app')
@section('css') @stop
@section('main')
    <div class="jumbotron text-center">
        <h1>Mini-Url</h1>
        <p>Daha qısa linklər</p>
        {!! Form::open(['url'=>'/result']) !!}
            <div class="col-md-offset-3 col-md-6 input-group">
                {!! Form::url('url',null,['class'=>"form-control",'placeholder'=>'Linki qısaltmaq üçün bura əlavə edin','required']) !!}
                <div class="input-group-btn">
                    {!! Form::submit('Qısalt',['class'=>'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}

    </div>
@endsection
@section('js')

@stop