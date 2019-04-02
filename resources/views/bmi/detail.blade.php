@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('_partial.flash_message')
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
            <div class="card-header" style="background:#00a445;color:white"><center>Result</center></div>
                <div class="card-body">
                    @csrf
                    <div id="bmi">
                        <table class="table table-striped">
                            <center><h2>Your BMI {{$bmi->bmi}} </center>
                            @if($bmi->bmi <= 18.4)
                            <center><h2 style="color:grey"><strong>Underweight</strong></h2></center>
                            @elseif($bmi->bmi >= 18.5 && $bmi->bmi <= 24.9)
                            <center><h2 style="color:green"><strong>Normal</strong></h2></center>
                            @elseif($bmi->bmi >= 25 && $bmi->bmi <= 29.9)
                            <center><h2 style="color:#e9e907"><strong>Overweight</strong></h2></center>
                            @elseif($bmi->bmi >= 30 && $bmi->bmi <= 34.9)
                            <center><h2 style="color:orange"><strong>Obese</strong></h2></center>
                            @else
                            <center><h2 style="color:red"><strong>Extremly Obese</strong></h2>
                            @endif
                            <thead>
                                <th>
                                <center>
                                    You are at 
                                    @if($bmi->bmi <= 18.4)
                                    @elseif($bmi->bmi >= 18.5 && $bmi->bmi <= 24.9)
                                        at Low Risk
                                    @elseif($bmi->bmi >= 25 && $bmi->bmi <= 29.9)
                                        at Moderate Risk
                                    @elseif($bmi->bmi >= 30 && $bmi->bmi <= 34.9)
                                        at High Risk
                                    @else
                                        at Very High Risk
                                    @endif
                                </center>
                                </th>
                            </thead>
                            <tbody>
                                <td style="background:grey;color:white">
                                    @if($bmi->bmi <= 18.4)
                                        *But increased risk of other clinical problems <p></p>
                                        AT RISK of nutritional deficiency and osteoporosis. 
                                        You are encouraged to eat a balanced meal and to seek 
                                        medical advice if necessary.
                                    @elseif($bmi->bmi >= 18.5 && $bmi->bmi <= 24.9)
                                        Achieve a healthy weight by balancing your caloric 
                                        input (diet) and output (physical activity).
                                    @elseif($bmi->bmi >= 25 && $bmi->bmi <= 29.9)
                                        Aim to lose 5% to 10% of your body weight over 6 to 12
                                        months by increasing physical activity and reducing caloric intake
                                    @elseif($bmi->bmi >= 30 && $bmi->bmi <= 34.9)
                                        Aim to lose 5% to 10% of your body weight over 6 to 12 months by 
                                        increasing physical activity and reducing caloric intake. 
                                        Go for regular health screening to keep co-morbid conditions* in check.
                                    @else
                                        at Very High Risk
                                    @endif
                                </td>
                            </tbody>
                        </table>
                        @if(Auth::check())
                        <center>
                            <a href="{{url('create')}}">
                                <button type="submit" class="btn btn-success" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 3px 10px 0 rgba(0,0,0,0.19);">
                                    {{ __('Hitung Lagi') }}
                                </button>
                            </a>
                                <a href="{{url('home')}}">
                                <button type="submit" class="btn btn-success" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 3px 10px 0 rgba(0,0,0,0.19);">
                                    {{ __('Lihat BMI') }}
                                </button>
                            </a>
                        </center>
                        @else
                        <center>
                        <a href="{{url('create')}}">
                            <button type="submit" class="btn btn-success" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 3px 10px 0 rgba(0,0,0,0.19);">
                                {{ __('Back to calculator') }}
                            </button>
                        </a>
                        </center>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
            <div class="card-header" style="background:#00a445;color:white"><center>Table BMI</center></div>
                <div class="card-body" style="background:#05bd53;color:white">
                    @csrf
                    <div id="bmi">
                        <table class="table" style="background:#0f8842">
                        The body mass index (BMI) or Quetelet index is a value 
                        derived from the mass (weight) and height of an individual.
                        <p></p>
                            <thead>
                                <tr>
                                    <th><center>Number</center></th>
                                    <th><center>Category</center></th>
                                    <th><center>Range</center></th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background:grey;color:white">
                                    <td><center>1</center></td>
                                    <td><center>Underweight</center></td>
                                    <td><center>< 18.5</center></td>
                                </tr>
                                <tr style="background:green;color:white">
                                    <td><center>2</center></td>
                                    <td><center>Normal</center></td>
                                    <td><center>18.5 - 24.9</center></td>
                                </tr>
                                <tr style="background:yellow;color:black">
                                    <td><center>3</center></td>
                                    <td><center>Overweight</center></td>
                                    <td><center>25 - 29.9</center></td>
                                </tr>
                                <tr style="background:orange;color:white">
                                    <td><center>4</center></td>
                                    <td><center>Obese</center></td>
                                    <td><center>30 - 34.9</center></td>
                                </tr>
                                <tr style="background:red;color:white">
                                    <td><center>5</center></td>
                                    <td><center>Extremly Obese</center></td>
                                    <td><center>> 35</center></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@stop