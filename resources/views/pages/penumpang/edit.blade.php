@extends('layouts.guest')

@section('content')
<section class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('penumpang.update', $penumpang->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input class="form-control" id="nama" type="text" name="nama" value="{{ old('nama', $penumpang->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_travel">Travel</label>
                    <select class="form-control" name="id_travel" id="id_travel">
                        <option value>-- Pilih Opsi --</option>
                        @foreach ($travels as $travel)
                            <option value="{{ $travel->id }}" {{ $travel->id == old('id_travel', $penumpang->id_travel) ? 'selected' : '' }}>
                                {{ $travel->tanggal_keberangkatan }} - Kuota: {{ $travel->kuota }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value>-- Pilih Opsi --</option>
                        <option value="Laki - Laki" {{ old('jenis_kelamin', $penumpang->jenis_kelamin) == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $penumpang->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kota">Kota</label>
                    <input class="form-control" id="kota" type="text" name="kota" value="{{ old('kota', $penumpang->kota) }}">
                </div>
                <div class="mb-3">
                    <label for="usia">Usia</label>
                    <input class="form-control" id="usia" type="number" name="usia" value="{{ old('usia', $penumpang->usia) }}">
                </div>
                <div class="mb-3">
                    <label for="tahun_lahir">Tahun Lahir</label>
                    <input class="form-control" id="tahun_lahir" type="number" name="tahun_lahir" min="1900" max="{{ date('Y') }}" value="{{ old('tahun_lahir', $penumpang->tahun_lahir) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{ route('penumpang.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div> 
</section>
@endsection
