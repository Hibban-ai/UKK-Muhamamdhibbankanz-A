<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="navbar-brand">
                <div class="container">
                    <h2 class="text-white">Pengaduan</h2>
                </div>
            </div>
            
            <div class="theme-toggle d-flex gap-2 align-items- mt-2">
        
                <div class="form-check form-switch fs-6">
                    <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                    <label class="form-check-label"></label>
                </div>
            
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item {{Route::is('admin.dashboard') ? 'active' : ''}}">
                <a href="{{route('admin.dashboard')}}" class="sidebar-link">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if(Auth::guard('petugas')->user()->level == 'admin')
                <li class="sidebar-item {{Route::is('admin.masyarakat-verif') || Route::is('admin.masyarakat-unverif') ? 'active' : ''}} has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Masyarakat</span>
                    </a>
                    <ul class="submenu {{Route::is('admin.masyarakat-verif') || Route::is('admin.masyarakat-unverif') ? 'active' : ''}}">
                        <li class="submenu-item {{Route::is('admin.masyarakat-verif') ? 'active' : ''}}">
                            <a href="{{route('admin.masyarakat-verif')}}">Terverifikasi</a>
                        </li>
                        <li class="submenu-item {{Route::is('admin.masyarakat-unverif') ? 'active' : ''}}">
                            <a href="{{route('admin.masyarakat-unverif')}}">Belum Verifikasi</a>
                        </li>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{Route::is('admin.petugas.index') ? 'active' : ''}}">
                    <a href="{{route('admin.petugas.index')}}" class="sidebar-link">
                        <i class="bi bi-person"></i>
                        <span>Petugas</span>
                    </a>
                </li>
            @endif

            <li class="sidebar-item {{Route::is('admin.pengaduan*') ? 'active' : ''}} has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-collection-fill"></i>
                    <span>Pengaduan</span>
                </a>
                <ul class="submenu {{Route::is('admin.pengaduan*') ? 'active' : ''}}">
                    <li class="submenu-item {{Route::is('admin.pengaduan-done') ? 'active' : ''}}">
                        <a href="{{route('admin.pengaduan-done')}}">Ditanggapi</a>
                    </li>
                    <li class="submenu-item {{Route::is('admin.pengaduan-undone') ? 'active' : ''}}">
                        <a href="{{route('admin.pengaduan-undone')}}">Belum Ditanggapi</a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item {{Route::is('admin.laporan-generate') ? 'active' : ''}}">
                <a href="admin.laporan-generate" class="sidebar-link">
                    <i class="bi bi-bookmark-fill"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('admin.logout')}}" class="sidebar-link">
                    <i class="bi bi-arrow-left-circle-fill"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
