<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page Daftar Pegawai</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('landingpage') }}/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('landingpage') }}/css/styles.css" rel="stylesheet" />
    <style>
        .btn {
            background-color: blue;
            color: white;
        }

        /* .team-member img.rounded-circle {
            border: 2px solid #007bff;
        } */
    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar">
        <div class=" container">
            <a class="navbar-brand"><strong>Data Pegawai</a>
            <a href="{{ route('login') }}" class="btn">Login</a>
        </div>
    </nav>
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Struktur Organisasi</h2>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src=" 
                            @if ($kadis) {{ asset('storage/' . $kadis->foto) }}
                             
                            @else 
                            {{ '-' }} @endif ">
                        <h4>
                            @if ($kadis)
                                {{ $kadis->nama }}
                            @else
                                {{ '-' }}
                            @endif
                        </h4>
                        <p class="text-muted">Kepala
                            Dinas</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="
                            @if ($kadis) {{ asset('storage/' . $sekretaris->foto) }}
                            @else 
                            {{ '-' }} @endif " />
                        <h4>
                            @if ($sekretaris)
                                {{ $sekretaris->nama }}
                            @else
                                {{ '-' }}
                            @endif
                        </h4>
                        <p class="text-muted">Sekretaris Dinas</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="
                            @if ($kabidikp) {{ asset('storage/' . $kabidikp->foto) }}
                            @else 
                            {{ '-' }} @endif " />
                        <h4>
                            @if ($kabidikp)
                                {{ $kabidikp->nama }}
                            @else
                                {{ '-' }}
                            @endif
                        </h4>
                        <p class="text-muted">Kepala Bidang IKP</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="
                            @if ($kabidtip) {{ asset('storage/' . $kabidtip->foto) }}
                            @else 
                            {{ '-' }} @endif " />
                        <h4>
                            @if ($kabidtip)
                                {{ $kabidtip->nama }}
                            @else
                                {{ '-' }}
                            @endif
                        </h4>
                        <p class="text-muted">Kepala Bidang TIP</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="
                            @if ($kabidstatistik) {{ asset('storage/' . $kabidstatistik->foto) }}
                            @else 
                            {{ '-' }} @endif " />
                        <h4>
                            @if ($kabidstatistik)
                                {{ $kabidstatistik->nama }}
                            @else
                                {{ '-' }}
                            @endif
                        </h4>
                        <p class="text-muted">Kepala Bidang Statistik</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="team-member">
                        @forelse ($anggotaikp as $anggota)
                            <img class="mx-auto rounded-circle" src="{{ asset('storage/' . $anggota->foto) }}" />
                            <h4>{{ $anggota->nama }}</h4>
                            <p class="text-muted">Anggota Bidang IKP</p>
                        @empty
                            <img class="mx-auto rounded-circle" src="#" />
                            <h4>{{ '-' }}</h4>
                            <p class="text-muted">Anggota Bidang IKP</p>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        @forelse ($anggotatip as $anggota)
                            <img class="mx-auto rounded-circle" src="{{ asset('storage/' . $anggota->foto) }}" />
                            <h4>{{ $anggota->nama }}</h4>
                            <p class="text-muted">Anggota Bidang TIP</p>
                        @empty
                            <img class="mx-auto rounded-circle" src="#" />
                            <h4>{{ '-' }}</h4>
                            <p class="text-muted">Anggota Bidang TIP</p>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        @forelse ($anggotastatistik as $anggota)
                            <img class="mx-auto rounded-circle" src="{{ asset('storage/' . $anggota->foto) }}" />
                            <h4>{{ $anggota->nama }}</h4>
                            <p class="text-muted">Anggota Bidang Statistik</p>
                        @empty
                            <img class="mx-auto rounded-circle" src="#" />
                            <h4>{{ '-' }}</h4>
                            <p class="text-muted">Anggota Bidang Statistik</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Data Pegawai Tahun {{ date('Y') }}</div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('landingpage') }}/js/scripts.js"></script>
</body>

</html>
