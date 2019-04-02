@extends('template')

@section('main')
    <div id="bmi">
        <h2>Data Input</h2>

        @if(!empty($bmi_list))
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Tinggi</th>
                        <th>Berat</th>
                        <th>BMI</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bmi_list as $bmi):?>
                    <tr>
                        <td>{{ $bmi->tanggal }}</td>
                        <td>{{ $bmi->tinggi }}</td>
                        <td>{{ $bmi->berat }}</td>
                        <td>{{ $bmi->bmi }}</td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        @else
            <p>Tidak ada data bmi</p>
        @endif

        <div class="table-bottom">
            <div class="pull-left">
                <strong>Jumlah BMI : {{ $bmi_count }} </strong>
            </div>
            <div class="paging">
                {{ $bmi_list->links() }}
            </div>
        </div>
        <div class="bottom-nav">
            <div class="pull-left">
                <a href="create" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('footer')
@stop

