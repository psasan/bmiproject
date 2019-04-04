@extends('layouts.app')

@section('content')
<div class="container" style="padding-bottom:15px">
    <div class="row justify-content-center" >
        <div class="col-md-16">
            <div class="card" style="padding-left:10px;padding-top:10px;padding-right:10px;background:#05bd53;color:white;">
                <center><h2 >Edit My Body Mass Index (BMI)</h2></center>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4" style="padding-bottom:15px">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <div>
                        <center>{{ Html::image('img/capture.jpg', 'gambar', array('width'=>'260','height'=>'153')) }}</center>
                        <center>
                        <h4 style="background:#f4fff4">Status : 
                        @if($bmi->bmi <= 18.4)
                            <strong style="color:grey">Underweight</strong>
                            @elseif($bmi->bmi >= 18.5 && $bmi->bmi <= 24.9)
                            <strong style="color:green">Normal</strong>
                            @elseif($bmi->bmi >= 25 && $bmi->bmi <= 29.9)
                            <strong style="color:#e9e907">Overweight</strong>
                            @elseif($bmi->bmi >= 30 && $bmi->bmi <= 34.9)
                            <strong style="color:orange">Obese</strong>
                            @else
                            <strong style="color:red">Extremly Obese</strong>
                            @endif
                        </h4>
                        </center>
                        <table class="table" style="background:#05bd53;color:white">
                            <thead>
                                <th><center>Tanggal</center></th>
                                <th><center>Tinggi</center></th>
                                <th><center>Berat</center></th>
                                <th><center>BMI</center></th>
                            </thead>
                            <tbody style="background:#aaffae;color:black">
                                <tr>
                                    <td><center>{{ date('d-m-Y', strtotime($bmi->tanggal)) }}</center></td>
                                    <td><center>{{ $bmi->tinggi }}</center></td>
                                    <td><center>{{ $bmi->berat }}</center></td>
                                    <td><center>{{ $bmi->bmi }}</center></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="background:#aaffae">
                <div class="card-header" style="background:#05bd53;color:white">
                    <center>{{ __('Count BMI') }}</center>
                </div>
                <div class="card-body">
                    @csrf
                    <div id="bmi">
                        @include('errors.form_error_list')
                        {!! Form::model($bmi, ['method'=>'PATCH','action'=>['BMIController@update',$bmi->id]]) !!}
                            @include('bmi.form',['submitButtonText'=>'Update BMI'])
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection