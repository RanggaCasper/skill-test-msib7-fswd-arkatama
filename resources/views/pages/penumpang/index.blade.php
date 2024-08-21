@extends('layouts.guest')

@section('content')
<section class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('penumpang.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input class="form-control" id="nama" type="text" name="nama">
                </div>
                <div class="mb-3">
                    <label for="id_travel">Travel</label>
                    <select class="form-control" name="id_travel" id="id_travel">
                        <option value>-- Pilih Opsi --</option>
                        @foreach ($travels as $travel)
                            <option value="{{ $travel->id }}">{{ $travel->tanggal_keberangkatan }} - {{ $travel->kuota }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value>-- Pilih Opsi --</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kota">Kota</label>
                    <input class="form-control" id="kota" type="text" name="kota">
                </div>
                <div class="mb-3">
                    <label for="usia">Usia</label>
                    <input class="form-control" id="usia" type="number" name="usia">
                </div>
                <div class="mb-3">
                    <label for="tahun_lahir">Tahun</label>
                    <input class="form-control" id="tahun_lahir" type="number" name="tahun_lahir" min="4" max="{{ date('Y') }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4>Daftar Penumpang</h4>
            <a href="{{ route('travel.index') }}" class="btn btn-primary btn-sm">Tambah Travel</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Travel</th>
                        <th>Kode Booking</th>
                        <th>Nama</th>
                        <th>Kelamin</th>
                        <th>Kota</th>
                        <th>Usia</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penumpangs as $penumpang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penumpang->id_travel }}</td>
                            <td>{{ $penumpang->kode_booking }}</td>
                            <td>{{ $penumpang->nama }}</td>
                            <td>{{ $penumpang->jenis_kelamin }}</td>
                            <td>{{ $penumpang->kota }}</td>
                            <td>{{ $penumpang->usia }}</td>
                            <td>{{ $penumpang->tahun_lahir }}</td>
                            <td>
                                <a href="{{ route('penumpang.edit', $penumpang->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('penumpang.destroy', $penumpang->id) }}" method="POST" style="display:inline-block;">
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
