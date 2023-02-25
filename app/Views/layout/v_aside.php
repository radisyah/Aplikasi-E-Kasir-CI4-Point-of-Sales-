    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img
          src="<?= base_url() ?>/template/dist/img/AdminLTELogo.png"
          alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3"
          style="opacity: 0.8"
        />
        <span class="brand-text font-weight-light">E-Kasir</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        
        <!-- Sidebar user panel (optional) -->
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php foreach ($profil as $key => $value) { ?>
          <?php if ($value['id_user']==session()->get('id_user')) { ?>
            <div class="image">
              <img
                src="<?= base_url('img/'. $value['foto'])?>"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block"><?= $value['nama'] ?></a>
            </div>
            
          <?php } ?>
        <?php } ?>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a
                href="<?= base_url('dashboard') ?>"
                class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>"
              >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('penjualan') ?>" class="nav-link">
                <i class="nav-icon fas fa-cash-register"></i>
                <p>Penjualan</p>
              </a>
            </li>
            
            <li class="nav-item <?= $menu == 'master' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'master' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                    href="<?= base_url('produk') ?>"
                    class="nav-link <?= $sub_menu == 'produk' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'produk' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="<?= base_url('kategori') ?>"
                    class="nav-link <?= $sub_menu == 'kategori' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'kategori' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="<?= base_url('satuan') ?>"
                    class="nav-link <?= $sub_menu == 'satuan' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'satuan' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Satuan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="<?= base_url('user') ?>"
                    class="nav-link <?= $sub_menu == 'user' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'user' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>User</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item <?= $menu == 'laporan' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'laporan' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Laporan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                    href="<?= base_url('Laporan/LaporanHarian') ?>"
                    class="nav-link <?= $sub_menu == 'l_harian' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'l_harian' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Laporan Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="<?= base_url('laporan/LaporanBulanan') ?>"
                    class="nav-link <?= $sub_menu == 'l_bulanan' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'l_bulanan' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Laporan Bulanan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="<?= base_url('laporan/LaporanTahunan') ?>"
                    class="nav-link <?= $sub_menu == 'l_tahunan' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'l_tahunan' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Laporan Tahunan</p>
                  </a>
                </li>

              </ul>
            </li>
            
            <li class="nav-item">
              <a
                href="<?= base_url('setting') ?>"
                class="nav-link <?= $menu == 'set' ? 'active' : '' ?>"
              >
                <i class="nav-icon fas fa-user"></i>
                <p>Profil</p>
              </a>
            </li> 
            
            <li class="nav-item">
              <a
                href="<?= base_url('settingtoko') ?>"
                class="nav-link <?= $menu == 'setToko' ? 'active' : '' ?>"
              >
                <i class="nav-icon fas fa-cogs"></i>
                <p>Setting</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
