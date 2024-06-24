@extends('layouts.main')

@push('style')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('title', 'Data Detail Pegawai')

@section('contents')
    <div class="row">

    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                {{-- <img src="/imbar_pasfoto.png" alt="Foto Pegawai"
                    style="max-width: 200px; max-height: 200px; padding-left: 60px; position:center"> --}}
                <img src="{{ asset('storage/' . $datapegawai->foto) }}" alt="Foto Pegawai"
                    style="max-width: 200px; max-height: 200px;">
            </div>
            <div class="table-responsive mt-3">
                <table class="table">
                    <tr>
                        <th style="padding-right: 30px;">NAMA</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->nama }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">Jenis Kelamin</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->jk }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">NIK</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->nik }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">TEMPAT LAHIR</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">TANGGAL LAHIR</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">ALAMAT</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->alamat }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">NO. TELEPON</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->no_telepon }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">EMAIL</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->email }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">STATUS PERNIKAHAN</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->status_pernikahan }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">JABATAN</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->jabatan }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">STATUS KEPEGAWAIAN</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->status_kepegawaian }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">NIP</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->nip }}</td>
                    </tr>
                    <tr>
                        <th style="padding-right: 30px;">PENDIDIKAN TERAKHIR</th>
                        <th style="padding-right: 5px;">:</th>
                        <td>{{ $datapegawai->pendidikan_terakhir }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('daftar-pegawai') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection

@push('script')
@endpush
