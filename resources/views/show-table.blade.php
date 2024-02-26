@extends('layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Lihat Klasemen</div>
            <div class="card-body">
                <table class="table table-stripped table-hover table-condensed">
                    <thead class="thead">
                        <tr class="tr">
                            <th class="th">No</th>
                            <th class="th">Klub</th>
                            <th class="th">Menang</th>
                            <th class="th">Seri</th>
                            <th class="th">Kalah</th>
                            <th class="th">Jumlah Goal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skor as $key => $data)
                        <tr class="tr">
                            <th class="th">{{$data->score_id}}</th>
                            <th class="th">{{$data->club_name}}</th>
                            <th class="th">{{$data->club_wins}}</th>
                            <th class="th">{{$data->club_draws}}</th>
                            <th class="th">{{$data->club_loses}}</th>
                            <th class="th">{{$data->club_score}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection