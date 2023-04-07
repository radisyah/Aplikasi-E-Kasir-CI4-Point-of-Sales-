<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <div class="content">
    <div class="row">
      <!-- /.col-md-6 -->

      <div class="col-lg-7">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <label>No Faktur</label>
                  <label
                    class="form-control form-control-lg text-center text-danger"
                    ><?= $no_faktur ?></label
                  >
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label>Tanggal</label>
                  <label class="form-control form-control-lg text-center"
                    ><?= date('d M Y') ?></label
                  >
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label>Jam</label>
                  <label id="jam"  class="form-control form-control-lg text-center"></label>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label>Kasir</label>
                  <label
                    class="form-control form-control-lg text-center text-primary"
                    ><?= session()->get('username') ?></label
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0"></h5>
          </div>
          <div class="card-body bg-black color-palette text-right">
            <label class="display-4 text-green">Rp. <?= number_format($grand_total,0) ?></label>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->

      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <div class="row">
              <?php echo form_open('penjualan/AddCart') ?>
                <div class="col-lg-12">
                  <div class="row">   
                    <div class="col-2 input-group">
                      <input
                        name="kode_produk"
                        class="form-control"
                        placeholder="Barcode"
                        autocomplete="off"
                        id= "kode_produk"
                      />
                      <span class="input-group-append">
                        <a class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#cari-produk">
                          <i style="color: white" class="fas fa-search"></i>
                        </a>
                        <button type="reset" class="btn btn-danger btn-flat">
                          <i class="fas fa-times"></i>
                        </button>
                      </span>
                    </div>

                    <div class="col-3">
                      <input
                        name="nama_produk"
                        class="form-control"
                        placeholder="Nama Produk"
                        readonly
                      />
                    </div>

                    <div class="col-1">
                      <input
                        name="nama_kategori"
                        class="form-control"
                        placeholder="Kategori"
                        readonly
                      />
                    </div>

                    <div class="col-1">
                      <input
                        name="nama_satuan"
                        class="form-control"
                        placeholder="Satuan"
                        readonly
                      />
                    </div>

                    <div class="col-1">
                      <input
                        name="harga_jual"
                        class="form-control"
                        placeholder="Harga"
                        readonly
                      />
                    </div>


                    <div class="col-1">
                      <input
                        type="number"
                        min="1"
                        value="1"
                        name="qty"
                        class="form-control text-center"
                        placeholder="QTY"
                        id="qty"
                      />
                    </div>

                    <input
                      name="harga_beli"
                      type="hidden"
                    />
                  
                    <div class="col-3">
                      <button type="submit" class="btn btn-primary">
                        <i class="fas fa-cart-plus" ></i> Add
                      </button>
                      <a href="<?=  base_url('penjualan/ResetCart')?>" class="btn btn-warning">
                        <i class="fas fa-sync"></i> Reset
                      </a>
                      <a style="color:white" data-toggle="modal" onclick="Pembayaran()" data-target="#pembayaran" class="btn btn-success">
                        <i  class="fas fa-cash-register"></i> Pembayaran
                      </a>
                    </div>
                  </div>
                </div>
              <?php echo form_close() ?>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-12">
                <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <th>Kode/Barcode</th>
                      <th>Nama Produk</th>
                      <th>Kategori</th>
                      <th>Harga Jual</th>
                      <th width="100px">QTY</th>
                      <th>Total Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($cart as $key => $value) { ?>
                      <tr>
                      <td><?= $value['id'] ?></td>
                      <td><?= $value['name'] ?></td>
                      <td><?= $value['options']['nama_kategori'] ?></td>
                      <td class="text-right">Rp. <?= number_format($value['price'],0) ?></td>
                      <td class="text-center"><?= $value['qty'] ?> <?= $value['options']['nama_satuan'] ?></td>
                      <td class="text-right">Rp. <?= number_format($value['subtotal']) ?></td>
                      <td  class="text-center">
                        <a href="<?= base_url("penjualan/RemoveItem/".$value['rowid']) ?>" class="btn btn-flat btn-danger btn-sm">  <i class="fa fa-times text-white"> </i> </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="card-title m-0"></h5>
            </div>
            <div class="card-body bg-black color-palette text-center">
              <h4 class="text-yellow" id="terbilang"></h4>
            </div>
        </div>
      </div>

      <div class="col-lg-12">
        <?php 
        if(session()->getFlashdata('pesanSukses')){
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fas fa-check"></i> Success! - ';
          echo session()->getFlashdata('pesanSukses');
          echo '</div>';
        }
        ?>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Pencarian Produk -->
<div class="modal fade " id="cari-produk">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pencarian Data Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="example1" class="table table-bordered table-striped text-sm text-center">
          <thead>
            <tr >
              <th >No</th>
              <th >Kode</th>
              <th >Nama</th>
              <th >Harga</th>
              <th >Stok</th>
              <th >Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; 
            foreach ($produk as $key => $value) { ?>
            <tr>
              <td style=" width:30px"><?= $no++ ?></td>
              <td style=" width:30px"><?= $value['kode_produk'] ?></td>
              <td style=" width:30px"><?= $value['nama_produk'] ?></td>
              <td style=" width:30px">Rp. <?= number_format($value['harga_jual'],0) ?></td>
              <td style=" width:30px"><?= $value['stok'] ?></td>
              <td style=" width:30px"><button onclick="PilihProduk('<?= $value['kode_produk'] ?>')" class="btn btn-success btn-xs">Piih</button></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /Modal Pencarian Produk -->

<!-- Modal Pembayaran Produk -->
<div class="modal fade " id="pembayaran">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title">Transaksi Pembayaran</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php echo form_open('penjualan/SimpanTransaksi') ?>
       <div class="form-group">
          <label>Total Biaya</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"></i>Rp.</span>
              </div>
            <input id="grand_total" name="grand_total" value="<?= number_format($grand_total,0) ?>" readonly  class="text-danger form-control form-control-lg text-right"  placeholder="Harga Beli" required>
          </div>
        </div>

        <div class="form-group">
          <label>Dibayar</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"></i>Rp.</span>
              </div>
            <input id="dibayar" name="dibayar" value=""  class="form-control form-control-lg text-right text-primary" autocomplete="off">
          </div>
        </div>

        <div class="form-group">
          <label>Kembalian</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"></i>Rp.</span>
              </div>
            <input id="kembalian" name="kembalian" value=""  class="form-control form-control-lg text-right text-success" readonly>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-save"></i> Simpan Transaksi</button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /Modal Pembayaran Produk -->

<script>
  $(document).ready(function() {
    $('#kode_produk').focus();

    <?php if ($grand_total == 0) { ?>
      document.getElementById('terbilang').innerHTML ='Nol Rupiah';
    <?php } else { ?>
      document.getElementById('terbilang').innerHTML = terbilang(<?= $grand_total ?>) + ' Rupiah';
    <?php } ?>
    
    $('#kode_produk').keydown(function (e) {
      let kode_produk = $('#kode_produk').val();
      if (e.keyCode == 13) {
        e.preventDefault();
        if (kode_produk == '') {
          Swal.fire('Kode Produk Kosong');
        } else {
          CekProduk();
        }
      }
    });

    // Hitung Kembalian
    $('#dibayar').keyup(function e() {
      HitungKembalian();
    });

    

  });

  function CekProduk() {
    $.ajax({
      type: "POST",
      url: "<?= base_url('Penjualan/CekProduk') ?>",
      data: {
        kode_produk: $('#kode_produk').val(),
      },
      dataType: "JSON",
      success: function(response) {
        if (response.nama_produk == '') {
          Swal.fire('Kode Produk Tidak Terdaftar');
        }else{
          $('[name="nama_produk"]').val(response.nama_produk);
          $('[name="nama_kategori"]').val(response.nama_kategori);
          $('[name="nama_satuan"]').val(response.nama_satuan);
          $('[name="harga_jual"]').val(response.harga_jual);
          $('[name="harga_beli"]').val(response.harga_beli);
          $('#qty').focus();
        }
      }

    });
  }

  function PilihProduk(kode_produk) {
    $('#kode_produk').val(kode_produk);
    $('#cari-produk').modal('hide');
    $('#kode_produk').focus();
  }

  function pembayaran() {
    $('#pembayaran').modal('show'); 
   
  }

  new AutoNumeric('#dibayar', {
    digitGroupSeparator : ',',
    decimalPlaces: 0,
  });

  function HitungKembalian() {
    let grand_total =$('#grand_total').val().replace(/[^.\d]/g,'').toString();
    let dibayar = $('#dibayar').val().replace(/[^.\d]/g,'').toString();

    let kembalian = parseFloat(dibayar) - parseFloat(grand_total);
    $('#kembalian').val(kembalian);

    new AutoNumeric('#kembalian', {
    digitGroupSeparator : ',',
    decimalPlaces: 0,
  });
  }
  
</script>

<script>
  window.onload = function() {
    startTime();
  }
  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m= checkTime(m);
    s= checkTime(s);
    document.getElementById('jam').innerHTML = h + ':' + m + ':' + s;
    var t = setTimeout(function(){
      startTime();
    },500);
   
  }
   
  function checkTime(i) {
    if (i<10) {
      i = '0' + i;
    }
    return i;
  }
  
</script>
