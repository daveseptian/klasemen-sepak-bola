@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        Anda telah berhasil masuk!
                    </div>
                @endif    
                <div class="add-club card-body">
                    <a class= "btn btn-sm btn-success" href="
                    {{ route('addClub') }}
                    ">Tambah Klub</a>
                </div>
                <div class="add-matches card-body">
                    <a class= "btn btn-sm btn-success" href="
                    {{ route('addClubScores') }}
                    ">Tambah Pertandingan</a>
                </div>
                <div class="show-table card-body">
                    <a class= "btn btn-sm btn-success" href="
                    {{ route('viewTable') }}
                    ">Lihat Klasemen</a>
                </div>
            </div>
        </div>
    </div>    
</div>
    
@endsection