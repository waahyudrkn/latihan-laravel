<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{ route('maindashboard') }}" class="sidebar-brand">
        SMK<span>BISA</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{ route('maindashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">Pengguna</li>
        <li class="nav-item">
          <a href="{{ route('profile.edit') }}" class="nav-link">
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">Profile</span>
          </a>
        </li>
        <li class="nav-item nav-category">Tabel Data</li>
        <li class="nav-item">
          <a href="{{ route('siswa.index') }}" class="nav-link">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('mapel.index') }}" class="nav-link">
            <i class="link-icon" data-feather="book-open"></i>
            <span class="link-title">Mata pelajaran</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('nilai.index') }}" class="nav-link">
            <i class="link-icon" data-feather="bar-chart-2"></i>
            <span class="link-title">Nilai</span>
          </a>
        </li>
        <hr>
        <li class="nav-item nav-category">Action</li>
        <li class="nav-item">
            <a href="#" onclick="showBasicLogoutSwal()" class="nav-link">
                <i class="link-icon" data-feather="log-out"></i>
                <span class="link-title">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <script>
                function showBasicLogoutSwal() {
                    // Use basic SweetAlert
                    Swal.fire({
                        title: 'Logout Confirmation',
                        text: 'Anda yakin ingin keluar?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'ya, logout!',
                        cancelButtonText: 'tidak',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logout-form').submit();
                        }
                    });
                }
            </script>
        </li>
      </ul>
    </div>
  </nav>
 