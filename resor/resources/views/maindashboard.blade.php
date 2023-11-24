@extends('template.dashboard')

@section('template')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0" style="font-family: system-apple;">Welcome to Dashboard</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row flex-grow-1">
                    <div class="col-md-4 grid-margin">
                        <a href="{{ route('siswa.index') }}" class="card-link">
                            <div class="card" style="background-color: #176B87; color: white;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title mb-0" style="font-family: system-ui;">Tabel</h6>
                                        <i data-feather="chevron-right" class="icon-lg"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="mb-2" style="font-family: serif;">Siswa</h3>
                                            <p class="card-text">Informasi siswa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 grid-margin">
                        <a href="{{ route('mapel.index') }}" class="card-link">
                            <div class="card" style="background-color: #5B8FB9; color: white;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title mb-0" style="font-family: system-ui;">Tabel</h6>
                                        <i data-feather="chevron-right" class="icon-lg"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="mb-2" style="font-family: serif;">Mata Pelajaran</h3>
                                            <p class="card-text">Informasi mata pelajaran</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 grid-margin">
                        <a href="{{ route('nilai.index') }}" class="card-link">
                            <div class="card" style="background-color: #24706b; color: white;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title mb-0" style="font-family: system-ui;">Tabel</h6>
                                        <i data-feather="chevron-right" class="icon-lg"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="mb-2" style="font-family: serif;">Nilai</h3>
                                            <p class="card-text">Informasi nilai</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
