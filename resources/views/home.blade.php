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
        <div class="col-md-4" style="padding-bottom:10px">
            <div class="card" style="background:#aaffae">
                <div class="card-header" style="background:#00a445;color:white"><center>Statistik</center></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <canvas id="myChart" width="400" height="400" style="background:white"></canvas><br>
                    <script>

                    var Weight = @json($berat);
                    var Dates = @json($tanggal);
                    var BMI = @json($bmi);

                    var ctx = document.getElementById('myChart');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: Dates,
                            datasets: [{
                                label: 'Data Berat',
                                data: Weight,
                                backgroundColor: [
                                    'rgba(82, 255, 155, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(0, 164, 69, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            },{
                                label: 'Data BMI',
                                data: BMI,
                                backgroundColor: [
                                    'rgba(155, 220, 251, 0.6)'
                                ],
                                borderColor: [
                                    'rgba(0, 173, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                    </script>
                    
                    <table class="table table-striped" style="background:#03c655;color:white">
                        <tr>
                            <th><center>Nama</center></th>
                            <td><center>{{ auth::user()->name }}</center></td>
                        </tr>
                        <tr>
                            <th><center>Tanggal Lahir</center></th>
                        <td><center>{{ auth::user()->born }}</center></td>
                        </tr>
                        <tr>
                            <th><center>Jenis Kelamin</center></th>
                            <td><center>{{ auth::user()->gender }}</center></td>
                        </tr>
                    </table>
                    <!--
                        <td><center><Button class="btn btn-primary">Edit</Button></center></td>
                    -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="background:#aaffae">
                <div class="card-header" style="background:#00a445;color:white"><center>Data</center></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!empty($list_bmi))
                        <div id="bmi">
                            <table class="table table-responsive-sm" style="background:#03c655;color:white">
                                <thead style="background:#00a445">
                                    <th><center>Tanggal</center></th>
                                    <th>Tinggi</th>
                                    <th>Berat</th>
                                    <th>BMI</th>
                                    <th><center>Status</center></th>
                                    <th><center>Action</center> </th>
                                </thead>
                                <tbody>
                                    <?php foreach($list_bmi as $bmi):?>
                                    <tr>
                                        @if(Auth::id() == $bmi->id_user)
                                            <td><center>{{ date('d-m-Y',strtotime($bmi->tanggal)) }}</center></td>
                                            <td>{{ $bmi->tinggi }}</td>
                                            <td>{{ $bmi->berat }}</td>
                                            <td>{{ $bmi->bmi }}</td>

                                            @if($bmi->bmi <= 18.4)
                                                <td><center><label class="btn btn-primary" >{{ "Underweight" }}</label></center></td>
                                            @elseif($bmi->bmi >= 18.5 && $bmi->bmi <= 24.9)
                                                <td><center><label class="btn btn-success">{{ "Normal" }}</label></center></td>
                                            @elseif($bmi->bmi >= 25 && $bmi->bmi <= 29.9)
                                                <td><center><label class="btn btn-warning" >{{ "Overweight" }}</label></center></td>
                                            @elseif($bmi->bmi >= 30 && $bmi->bmi <= 34.9)
                                                <td><center><label class="btn btn-warning">{{ "Obese" }}</label></center></td>
                                            @else
                                                <td><center><label class="btn btn-danger" >{{ "Extremly Obese" }}</label></center></td>
                                            @endif
                                                <td>
                                                    <center>
                                                        <a href="{{ url('bmi/edit/'.$bmi->id) }}">
                                                            <img src="img/edit.png" alt="edit" width="35%">
                                                        </a>
                                                    </center>
                                                </td>
                                        @endif
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Data BMI belum ada!</p>
                    @endif
                    <div class="navbar">
                        <div class="navbar navbar-nav navbar-left">
                            <h5>Jumlah: {{ $count_bmi }}</h5>
                        </div>
                        <div class="navbar navbar-nav navbar-right">
                            {{ $list_bmi->links() }}
                        </div>    
                    </div>
                    <div>
                        <center><a href="create" class="btn btn-success" 
                        style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 3px 10px 0 rgba(0,0,0,0.19);">Tambah Data</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection