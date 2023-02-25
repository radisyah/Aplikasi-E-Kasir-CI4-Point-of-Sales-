<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3><?= $j_produk ?></h3>

      <p>Produk</p>
    </div>
    <div class="icon">
      <i class="fas fa-boxes"></i>
    </div>
    <a href="<?= base_url('produk') ?>" class="small-box-footer">
      More Info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3><?= $j_kategori ?><sup style="font-size: 20px"></sup></h3>

      <p>Kategori</p>
    </div>
    <div class="icon">
      <i class="fas fa-th-list"></i>
    </div>
    <a href="<?= base_url('kategori') ?>" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-warning">
    <div class="inner">
      <h3><?= $j_satuan ?></h3>

      <p>Satuan</p>
    </div>
    <div class="icon">
      <i class="fas fa-weight"></i>
    </div>
    <a href="<?= base_url('satuan') ?>" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h3><?= $j_user ?></h3>

      <p>User</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a href="<?= base_url('user') ?>" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-md-4">
  <!-- Info Boxes Style 2 -->
  <div class="info-box mb-3 bg-navy">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Pendapatan Hari Ini</span>
      <span class="info-box-number">Rp. <?= number_format($p_hari_ini['total_harga'],0) ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
</div>

<div class="col-md-4">
  <!-- Info Boxes Style 2 -->
  <div class="info-box mb-3 bg-indigo">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Pendapatan Bulan Ini</span>
      <span class="info-box-number">Rp. <?= number_format($p_bulan_ini['total_harga'],0) ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
</div>

<div class="col-md-4">
  <!-- Info Boxes Style 2 -->
  <div class="info-box mb-3 bg-fuchsia">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Pendapatan Tahun Ini </span>
      <span class="info-box-number">Rp. <?= number_format($p_tahun_ini['total_harga'],0) ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
</div>

<div class="col-md-12">
  <canvas id="myChart" width="100%" height="35px"></canvas>
  
</div>

<?php 
  if ($grafik=='') {
    $tgl[] = 0;
    $total[] = 0;
    $untung[] = 0;
  }else{
    foreach ($grafik as $key => $value) {
      $tgl[] = $value['tgl_jual'];
      $total[] = $value['total_harga'];
      $untung[] = $value['untung'];
  }
  
} ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: <?= json_encode($tgl) ?>,
      datasets: [{
        label: 'Grafik Pendapatan Penjualan Bulan <?= date('M y') ?>',
        data: <?= json_encode($total) ?>,
       
        borderColor: [
          'rgba(54,162,235,1)'
        ],
        borderWidth: 3
      },

      {
        label: 'Grafik Keuntungan Penjualan Bulan <?= date('M y') ?>',
        data: <?= json_encode($untung) ?>,
       
        borderColor: [
          'rgba(153,102,255,1)'
        ],
        borderWidth: 3
      },
      
      ]
    },
      
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>






