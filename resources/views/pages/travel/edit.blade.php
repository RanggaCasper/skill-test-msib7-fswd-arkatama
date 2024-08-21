@extends('layouts.guest')

@section('content')
<section class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('travel.update', $travel->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                    <input class="form-control" type="datetime-local" name="tanggal_keberangkatan" value="{{ $travel->tanggal_keberangkatan }}"  required>
                </div>
                <div class="mb-3">
                    <label for="kuota">Kuota</label>
                    <input class="form-control" type="number" name="kuota" value="{{ $travel->kuota }}"  required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{ route('travel.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div> 
</section>
@endsection
