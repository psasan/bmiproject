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
                <div class="card-header" style="background:#00a445;color:white"><center>My Profil</center></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <center>{{ Html::image('img/user.png', 'user', array('width'=>'60%',
                        'style'=>'background:#f9f9f9;opacity:0.9')) }}</center> <br>
                    <table class="table table-striped" style="background:#03c655;color:white">
                        <tr>
                            <th>Nama</th>
                            <td>{{ auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                        <td>{{ auth::user()->born }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ auth::user()->gender }}</td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td>{{ auth::user()->email }}</td>
                        </tr>
                    </table>
                    <div>
                        <td><center><button class="btn btn-success" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 3px 10px 0 rgba(0,0,0,0.19);"
                        onclick = "location.href='{{ url('#') }}'">Edit Profil</center></td>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection