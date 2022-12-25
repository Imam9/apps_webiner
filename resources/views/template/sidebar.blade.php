<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">Apps Webiner</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="">APS</a>
      </div>
      <div class="text-center">
        <img src="{{asset('')}}assets/logo.png" alt="logo" width="200" class="shadow-light">
      </div>
      <ul class="sidebar-menu">
        <?php if(Auth::user()->hak_akses == 'institusi'){ ?>
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{url('dashboard-institusi')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Master Data</li>
            <li><a class="nav-link" href="{{url('data-webiner')}}"><i class="fas fa-file"></i> <span>Data Webiner</span></a></li>
            <li><a class="nav-link" href="{{url('data-materi')}}"><i class="fas fa-book"></i> <span>Data Materi</span></a></li>
            <li><a class="nav-link" href="{{url('data-sertifikat')}}"><i class="fas fa-list"></i> <span>Data Sertifikat</span></a></li>
        <?php }else if(Auth::user()->hak_akses == 'pengguna'){ ?>
          <li class="menu-header">Dashboard</li>
          <li><a class="nav-link" href="{{url('dashboard-pengguna')}}"><i class="fas fa-home"></i> <span>Dashboard Pengguna</span></a></li>
          <li class="menu-header">Master Data</li>
          <li><a class="nav-link" href="{{url('data-webiner')}}"><i class="fas fa-book"></i> <span>Data Webiner</span></a></li>
          <li><a class="nav-link" href="{{url('data-pendaftaran')}}"><i class="fas fa-file"></i> <span>Data Pendafataran</span></a></li>
          <li><a class="nav-link" href="{{url('riwayat-pendaftaran')}}"><i class="fas fa-list"></i> <span>Riwayat Pendafataran</span></a></li>
        <?php }else{ ?>
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{url('dashboard-petugas')}}"><i class="fas fa-home"></i> <span>Dashboard Petugas</span></a></li>
            <li class="menu-header">Users</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Data Pengguna</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{url('data-petugas')}}">Data Petugas</a></li>
                <li><a class="nav-link" href="{{url('data-anggota')}}">Data Anggota</a></li>
                <li><a class="nav-link" href="{{url('data-admin')}}">Data Admin</a></li>
              </ul>
            </li>
            <li class="menu-header">Master Data</li>
            <li><a class="nav-link" href="{{url('data-buku')}}"><i class="fas fa-book"></i> <span>Data Buku</span></a></li>
            <li><a class="nav-link" href="{{url('data-peminjaman')}}"><i class="fas fa-file"></i> <span>Data Peminjaman</span></a></li>
            <li><a class="nav-link" href="{{url('data-pengembalian')}}"><i class="fas fa-list"></i> <span>Data Pengembalian</span></a></li>
            <li><a class="nav-link" href="{{url('data-laporan')}}"><i class="far fa-square"></i> <span>Data Laporan</span></a></li>
        
        
        <?php }   ?>
      </aside>
    </div>