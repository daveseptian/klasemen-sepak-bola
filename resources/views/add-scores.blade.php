@extends('layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Tambah Klasemen</div>
            <div class="card-body">
                <form action="{{ route('storeMatch') }}" method="POST">
                    @csrf

                    {{-- Klub 1 --}}
                    <div class="card-body">
                        <label>Klub 1</label>
                        <div class="form-group">
                            <label for="club_name1">Nama Klub 1 </label>
                            <input type="text" id="club_name1" name="club_name1" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="club_score">Skor </label>
                            <input type="number" id="club_score1" name="club_score1" class="form-control"/>
                        </div>
                    </div>

                    {{-- Klub 2 --}}
                    <div class="card-body">
                        <label>Klub 2</label>
                        <div class="form-group">
                            <label for="club_name2">Nama Klub 2 </label>
                            <input type="text" id="club_name2" name="club_name2" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="club_score2">Skor </label>
                            <input type="number" id="club_score2" name="club_score2" class="form-control"/>
                        </div>
                    </div>

                    {{-- Submit button --}}
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection