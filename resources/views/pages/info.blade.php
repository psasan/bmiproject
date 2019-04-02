@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
            <div class="card-header" style="background:#00a445;color:white"><center>How to Use</center></div>
                <div class="card-body" style="background:#05bd53;color:white">
                    @csrf
                    pending...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@stop