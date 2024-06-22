@extends('layouts.main')

@push('style')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('title', 'Tambahkan Data Pegawai')

@section('contents')
    <div class="row">

    </div>
    <form method="POST" action="{{ route('prosestambah') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-responsive mt-3">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ old('nama') }}">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">Nomor Induk Kependudukan(NIK)</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            value="{{ old('nik') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ old('tempat_lahir') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ old('alamat') }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                            value="{{ old('no_telepon') }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Aktif</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="status_pernikahan" class="form-label">Status Perkawinan</label>
                        <select type="text" class="form-control" id="status_pernikahan" name="status_pernikahan">
                            <option>Pilih Status Perkawinan</option>
                            <option value="Sudah Menikah"
                                {{ old('status_pernikahan') == 'Sudah Menikah' ? 'selected' : '' }}>Sudah Menikah</option>
                            <option value="Belum Menikah"
                                {{ old('status_pernikahan') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option>Pilih Jabatan Pegawai</option>
                            <option value="Kepala Dinas" {{ old('jabatan') == 'Kepala Dinas' ? 'selected' : '' }}>Kepala
                                Dinas</option>
                            <option value="Sekretaris" {{ old('jabatan') == 'Sekretaris' ? 'selected' : '' }}>Sekretaris
                            </option>
                            <option value="Kabid IKP" {{ old('jabatan') == 'Kabid IKP' ? 'selected' : '' }}>Kabid IKP
                            </option>
                            <option value="Kabid TIP" {{ old('jabatan') == 'Kabid TIP' ? 'selected' : '' }}>Kabid TIP
                            </option>
                            <option value="Kabid Statistik" {{ old('jabatan') == 'Kabid Statistik' ? 'selected' : '' }}>
                                Kabid Statistik</option>
                            <option value="Anggota IKP" {{ old('jabatan') == 'Anggota IKP' ? 'selected' : '' }}>Anggota IKP
                            </option>
                            <option value="Anggota TIP" {{ old('jabatan') == 'Anggota TIP' ? 'selected' : '' }}>Anggota TIP
                            </option>
                            <option value="Anggota Statistik"
                                {{ old('jabatan') == 'Anggota Statistik' ? 'selected' : '' }}>Anggota Statistik</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_kepegawaian" class="form-label">Status Kepegawaian</label>
                        <select name="status_kepegawaian" id="status_kepegawaian" class="form-control">
                            <option>Pilih Status Kepegawaian</option>
                            <option value="PNS" {{ old('status_kepegawaian') == 'PNS' ? 'selected' : '' }}>PNS</option>
                            <option value="Kontrak" {{ old('status_kepegawaian') == 'Kontrak' ? 'selected' : '' }}>Kontrak
                            </option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">Nomor Induk Pegawai(NIP)</label>
                        <input type="text" class="form-control" id="nip" name="nip"
                            value="{{ old('nip') }}">
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                        <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control">
                            <option>Pilih Pendidikan Terakhir</option>
                            <option value="SD/MI Sederajat"
                                {{ old('pendidikan_terakhir') == 'SD/MI Sederajat' ? 'selected' : '' }}>SD/MI Sederajat
                            </option>
                            <option value="SMP/MTS Sederajat"
                                {{ old('pendidikan_terakhir') == 'SMP/MTS Sederajat' ? 'selected' : '' }}>SMP/MTS Sederajat
                            </option>
                            <option value="SMA/SMK/MA Sederajat"
                                {{ old('pendidikan_terakhir') == 'SMA/SMK/MA Sederajat' ? 'selected' : '' }}>SMA/SMK/MA
                                Sederajat</option>
                            <option value="Sarjana" {{ old('pendidikan_terakhir') == 'Sarjana' ? 'selected' : '' }}>
                                Sarjana</option>
                            <option value="Lainnya" {{ old('pendidikan_terakhir') == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Pegawai</label>
                        <input type="file" class="form-control" id="foto" name="foto"
                            value="{{ old('foto') }}">
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection

@push('script')
@endpush
