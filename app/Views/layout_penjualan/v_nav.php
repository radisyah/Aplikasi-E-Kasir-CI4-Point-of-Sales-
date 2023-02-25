<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="../../index3.html" class="navbar-brand">
      
      <span class="brand-text font-weight-light"><i class="fas fa-shopping-cart text-primary"></i> Transaksi Penjualan</span>
    </a>

    <button
      class="navbar-toggler order-1"
      type="button"
      data-toggle="collapse"
      data-target="#navbarCollapse"
      aria-controls="navbarCollapse"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <?php if (session()->get('level')==1) { ?>
        <li class="nav-item">
          <a
            class="nav-link"
            href="<?= base_url('dashboard') ?>"
            role="button"
            ><i class="fas fa-th-large"></i
          ></a>
        </li>
      <?php } else { ?>
        <li class="nav-item">
          <a
            class="nav-link"
            href="<?= base_url('auth/logout') ?>"
            role="button"
            ><i class="fas fa-sign-in-alt"></i
          ></a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>
<!-- /.navbar -->
