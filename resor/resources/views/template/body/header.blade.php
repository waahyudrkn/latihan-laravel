<nav class="navbar">
  <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
      <ul class="navbar-nav">              
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="text-white">{{ Auth::user()->name }}</span>
                  <i class="icon-md text-white" data-feather="chevron-down"></i>
              </a>
              <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                  <ul class="list-unstyled p-1">
                      <li class="dropdown-item py-2">
                          <a href="{{ route('profile.edit') }}" class="text-body ms-0">
                              <i class="me-2 icon-md" data-feather="user"></i>
                              <span>Profile</span>
                          </a>
                      </li>
                      <li class="dropdown-item py-2">
                        <a href="#" onclick="confirmLogoutDropdown()" class="nav-link d-flex align-items-center">
                            <i class="btn-icon-prepend" data-feather="log-out"></i>
                            <span class="ms-2">Log-out</span>
                        </a>
                        <form id="logout-form-dropdown" onsubmit="return confirm('Apakah Anda Yakin Mau Logout ?')"
                              class="d-inline" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="d-none"></button>
                        </form>
                    
                        <script>
                            function confirmLogoutDropdown() {
                                if (confirm('Apakah Anda Yakin Mau Logout ?')) {
                                    document.getElementById('logout-form-dropdown').submit();
                                }
                            }
                        </script>
                    </li>
                    
                  </ul>
              </div>
          </li>
      </ul>
  </div>
</nav>
