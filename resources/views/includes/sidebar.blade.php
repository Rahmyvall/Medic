 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
             <img src="{{ asset('template/img/fashion.png') }}" alt="Logo" style="width: 50px; height: 50px;">
             <div class="sidebar-brand-text mx-3">SIMRS</div>
         </div>
     </a>

     <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
         <a class="nav-link" href="/dashboard">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
             aria-expanded="true" aria-controls="collapseMaster">
             <i class="fas fa-fw fa-database"></i>
             <span>Master Data</span>
         </a>
         <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Kelola Data:</h6>
                 <a class="collapse-item {{ request()->is('dokter*') ? 'active' : '' }}"
                     href="{{ route('dokter.index') }}">
                     <i class="fas fa-fw fa-user-md"></i> Dokter
                 </a>
                 <a class="collapse-item {{ request()->is('pasien*') ? 'active' : '' }}"
                     href="{{ route('pasien.index') }}">
                     <i class="fas fa-fw fa-procedures"></i> Pasien
                 </a>
                 <a class="collapse-item {{ request()->is('kunjungan*') ? 'active' : '' }}"
                     href="{{ route('kunjungan.index') }}">
                     <i class="fas fa-fw fa-notes-medical"></i> Kunjungan
                 </a>
                 <a class="collapse-item {{ request()->is('rekam_medis*') ? 'active' : '' }}"
                     href="{{ route('rekam_medis.index') }}">
                     <i class="fas fa-fw fa-file-medical-alt"></i> Rekam Medis
                 </a>


             </div>
         </div>
     </li>

     <!-- Nav Item - Resep & Obat -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResepObat"
             aria-expanded="true" aria-controls="collapseResepObat">
             <i class="fas fa-fw fa-pills"></i>
             <span>Resep & Obat</span>
         </a>
         <div id="collapseResepObat" class="collapse" aria-labelledby="headingResepObat"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Kelola Resep dan Obat:</h6>
                 <a class="collapse-item {{ request()->is('reseps*') ? 'active' : '' }}"
                     href="{{ route('reseps.index') }}">
                     <i class="fas fa-fw fa-prescription"></i> Resep
                 </a>
                 <a class="collapse-item {{ request()->is('obat*') ? 'active' : '' }}"
                     href="{{ route('obat.index') }}">
                     <i class="fas fa-fw fa-pills"></i> Obat
                 </a>
                 <a class="collapse-item {{ request()->is('detailreseps*') ? 'active' : '' }}"
                     href="{{ route('detailreseps.index') }}">
                     <i class="fas fa-fw fa-notes-medical"></i> Detail Resep
                 </a>
                 <a class="collapse-item {{ request()->is('pembayaran*') ? 'active' : '' }}"
                     href="{{ route('pembayaran.index') }}">
                     <i class="fas fa-fw fa-money-bill-wave"></i> Pembayaran
                 </a>

             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout"
             aria-expanded="true" aria-controls="collapseAbout">
             <i class="fas fa-fw fa-info-circle"></i>
             <span>About</span>
         </a>
         <div id="collapseAbout" class="collapse" aria-labelledby="headingAbout" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Kelola Halaman About:</h6>
                 <a class="collapse-item {{ request()->is('about_us*') ? 'active' : '' }}"
                     href="{{ route('about_us.index') }}">
                     <i class="fas fa-fw fa-building"></i> Tentang Rumah Sakit
                 </a>
             </div>
         </div>
     </li>
 </ul>
