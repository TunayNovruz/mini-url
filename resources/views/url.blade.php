@extends('layouts.app')
@section('main')
    <div class="jumbotron">

        <div class="col-md-offset-3 col-md-6">
            <h1>Qısa Link Hazırdır:</h1>
            <h3 class="text-center" id="result">
                {{url($new_url)}}
            </h3>
        </div>
    </div>

@endsection
@section('css')@endsection
@section('js')@endsection