
<script src="<?= base_url(); ?>/dashboard/js/sidebar.js"></script>


<!-- ========== MAIN CONTENT ========== -->
  <!-- Navbar Vertical -->
  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white">
  <div class="navbar-vertical-container">
    <div class="navbar-vertical-footer-offset">
      <!-- Logo -->
      <a class="navbar-brand" href="<?= base_url(); ?>/index.html" aria-label="Front">
        <img class="navbar-brand-logo" src="<?= base_url(); ?>/dashboard/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo" src="<?= base_url(); ?>/dashboard/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
        <img class="navbar-brand-logo-mini" src="<?= base_url(); ?>/dashboard/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo-mini" src="<?= base_url(); ?>/dashboard/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
        <span class="logo-text nav-link-title">Desa Sukalarang</span>
      </a>

        <!-- End Logo -->

        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>

        <!-- End Navbar Vertical Toggle -->

        <!-- Content -->
        <div class="navbar-vertical-content">
          <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
          
          <!-- Collapse -->
            <div class="nav-item">
              <a class="nav-link" href="<?= base_url('/home'); ?>" role="button" aria-expanded="true">
                <i class="bi-house-door nav-icon"></i>
                <span class="nav-link-title">Dashboards</span>
              </a>
            </div>
            <?php if (in_groups('admin')) : ?>
            <span class="dropdown-header ">Pages</span>
            <small class="bi-three-dots nav-subtitle-replacer"></small>

            <!-- Collapse -->
            <div class="navbar-nav nav-compact">

            </div>
            <div id="navbarVerticalMenuPagesMenu">
              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-people nav-icon"></i>
                  <span class="nav-link-title">Users</span>
                </a>

                <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                  <a class="nav-link " href="<?= base_url('admin/user_list')?>">User List</a>
                  <a class="nav-link " href="<?= base_url('admin/tambah_user')?>">Add User </span></a>
                </div>
              </div>
              <?php endif; ?>
              <div class="nav-item">
              <a class="nav-link" href="<?= base_url('/surat'); ?>" role="button" aria-expanded="true">
                <i class="bi bi-envelope nav-icon"></i>
                <span class="nav-link-title">Surat</span>
              </a>
            </div>
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenuArsip" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenuArsip" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenuArsip">
                  <i class="bi bi-archive nav-icon"></i>
                  <span class="nav-link-title">Arsip</span>
                </a>

                <div id="navbarVerticalMenuPagesUsersMenuArsip" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenuArsip">
                  <a class="nav-link " href="<?= base_url('arsip')?>">Data Arsip</a>
                  <a class="nav-link " href="<?= base_url('arsip/add')?>">Tambah Arsip</span></a>
                </div>
              </div>
            <!-- End Collapse -->
        </div>
        
        <!-- End Content -->

        <!-- Footer -->
        <div class="navbar-vertical-footer">
          <ul class="navbar-vertical-footer-list">
            <li class="navbar-vertical-footer-list-item">
              <!-- Style Switcher -->
              <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

                </button>

                <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                  <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                    <i class="bi-moon-stars me-2"></i>
                    <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                  </a>
                  <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                    <i class="bi-brightness-high me-2"></i>
                    <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                  </a>
                  <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                    <i class="bi-moon me-2"></i>
                    <span class="text-truncate" title="Dark">Dark</span>
                  </a>
                </div>
              </div>

              <!-- End Style Switcher -->
            </li>
          </ul>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </aside>