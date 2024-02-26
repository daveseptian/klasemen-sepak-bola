@extends('layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Add Club</div>
            <div class="card-body">
                <form action="{{ route('storeClub') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="club_name">Nama Klub </label>
                        <input type="text" id="club_name" name="club_name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="club_city">Kota Klub </label>
                        <input type="text" id="club_city" name="club_city" class="form-control"/>
                    </div>
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