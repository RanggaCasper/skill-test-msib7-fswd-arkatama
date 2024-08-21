@extends('layouts.guest')

@section('content')
<section class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('travel.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                    <input class="form-control" type="datetime-local" name="tanggal_keberangkatan" required>
                </div>
                <div class="mb-3">
                    <label for="kuota">Kuota</label>
                    <input class="form-control" type="number" name="kuota" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4>Daftar Travel</h4>
            <a href="{{ route('penumpang.index') }}" class="btn btn-primary btn-sm">Tambah Penumpang</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Kuota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($travels as $travel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $travel->tanggal_keberangkatan }}</td>
                            <td>{{ $travel->kuota }}</td>
                            <td>
                                <a href="{{ route('travel.edit', $travel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('travel.destroy', $travel->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
</section>
@endsection
