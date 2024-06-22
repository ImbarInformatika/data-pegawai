@extends('layouts.main')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">
    </link>
@endpush

@section('title', 'Daftar Pegawai')

@section('contents')
    <div class="row">
        {{-- Button Menambahkan Data Pegawai --}}
        <div class="col">
            <a href="{{ route('tambah') }}" class="btn btn-primary">Tambahkan Pegawai</a>
        </div>
        <div class="mt-3">
            @if (session('success_tambah'))
                <div class="alert alert-success">
                    {{ session('success_tambah') }}
                </div>
            @endif

            @if (session('gagal_tambah'))
                <div class="alert alert-danger">
                    {{ session('gagal_tambah') }}
                </div>
            @endif

            @if (session('success_update'))
                <div class="alert alert-primary">
                    {{ session('success_update') }}
                </div>
            @endif

            @if (session('login'))
                <div class="alert alert-success">
                    {{ session('login') }}
                </div>
            @endif

            @if (session('success_hapus'))
                <div class="alert alert-success">
                    {{ session('success_hapus') }}
                </div>
            @endif

            @if (session('gagal_hapus'))
                <div class="alert alert-danger">
                    {{ session('gagal_hapus') }}
                </div>
            @endif
        </div>
    </div>
    {{-- Tabel Daftar Pegawai --}}
    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive ">
                <table id="daftarpegawai" class="table table-striped display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Status Pekerjaan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datapegawai as $pegawai)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pegawai->nama }}</td>
                                <td>{{ $pegawai->jabatan }}</td>
                                <td>{{ $pegawai->status_kepegawaian }}</td>
                                <td>
                                    <a href="{{ url('detail/' . $pegawai->id) }}" class="btn btn-primary">Detail</a>
                                    <a href="{{ url('ubah/' . $pegawai->id) }}" class="btn btn-warning">Ubah</a>
                                    <a href="{{ url('hapus/' . $pegawai->id) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script>
        $(document).ready(function() {
            $('#daftarpegawai').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
                }
            })
        });
    </script>

    
@endpush
