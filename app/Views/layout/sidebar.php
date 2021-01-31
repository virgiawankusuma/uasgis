<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion shadow" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-map-marked-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kuwasen <sup>merdeka</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item  -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-check-double"></i>
            <span>Tampilkan</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Memilih menampilkan :</h6>
                <a class="collapse-item font-weight-bold <?= ($getsegment == '') ? 'active' : ''; ?>" href="/">Semua</a>
                <a class="collapse-item <?= ($getsegment == 'rt') ? 'active' : ''; ?>" href="/rt">Batas RT</a>
                <a class="collapse-item <?= ($getsegment == 'jalan') ? 'active' : ''; ?>" href="/jalan">Jalan</a>
                <a class="collapse-item <?= ($getsegment == 'fasilitas') ? 'active' : ''; ?>" href="/fasilitas">Fasilitas</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>