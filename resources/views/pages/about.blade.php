@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
            <div class="card-header" style="background:#00a445;color:white"><center>About</center></div>
                <div class="card-body" style="background:#05bd53;color:white">
                    @csrf
                    This website is practice only! <br> <br>    
                    You can use this website for calculating you bmi or
                    saving you bmi data to let you know how your Body Mass Index is. <br><br>
                    In this webiste you can register with an email and also you can login and keep saving your data. <br><br>
                    After login, in this webiste you can only saving 1 data each day. If you input more than 
                    1 then your last data will be updated not increase. <br><br>
                    If you make a mistake inputing your daily data, you can also edit it with this icon 
                    <img src="img/edit.png" width="5%"> for your convenience.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@stop