<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>@yield('title')</title>
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="d-flex flex-column h-100">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-md-3 col-lg-2 bg-dark sidebar">
                <div class="position-sticky">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Tabel Siswa Smk WIRA</span>
                    </a>
                    
                    <hr>
                    
                  <br>
                  <ul class="nav flex-column mb-auto">
                    <li class="nav-item mb-3">
                        <a href="{{ route('siswa.index') }}" class="nav-link d-flex align-items-center text-white" aria-current="page">
                            <i class="btn-icon-prepend" data-feather="users"></i>
                            <span class="ms-2">Siswa</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="{{ route('mapel.index') }}" class="nav-link d-flex align-items-center text-white" aria-current="page">
                            <i class="btn-icon-prepend" data-feather="book"></i>
                            <span class="ms-2">Mapel</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('nilai.index') }}" class="nav-link d-flex align-items-center text-white" aria-current="page">
                            <i class="btn-icon-prepend" data-feather="bar-chart-2"></i>
                            <span class="ms-2">Nilai</span>
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item mt-5">
                      <form onsubmit="return confirm('Apakah Anda Yakin Mau Logout ?')"
                                    class="d-inline" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link d-flex align-items-center text-white" aria-current="page">
                                        <i class="btn-icon-prepend" data-feather="log-out"></i>
                                        <span class="ms-2">Log-out</span>
                                    </button>
                                </form>
                      
                  </li>
                </ul>
                
                
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="/siswa">
                      <i class="btn-icon-prepend" data-feather="activity"></i>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                        <ul class="navbar-nav">
                            
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Pengaturan Akun">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    <i class="btn-icon-prepend" data-feather="settings"></i>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>

                <div class="container" style="max-height: calc(100vh - 56px); overflow-y: auto;">
                  @yield('isi')
              </div>

            </main>
        </div>
    </div>

    <script>
        feather.replace();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
