<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Produk</h3>
        <div class="card-tools">
          <button type="button" onclick="NewWin=window.open('<?= base_url('laporan/PrintProduk') ?>','NewWin','toolbar=no' )" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-print"></i> Print</button>
          <button type="button" data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-plus"></i>Add</button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php 
      if(session()->getFlashdata('pesanSukses')){
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success! - ';
        echo session()->getFlashdata('pesanSukses');
        echo '</h5></div>';
      }
      ?>

      <?php
      $errors = session()->getFlashdata('errors');
      if (!empty($errors)) { ?>
        <div class="alert alert-danger alert-dismissible">
          <h4>Periksa Entrian Form</h4>
          <ul>
            <?php foreach ($errors as $key => $error) { ?>
             <li><?= esc($error) ?></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>
      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
          <tr >
            <th width="50px">No</th>
            <th>Id</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
       
        <tbody>
        <?php $no=1; 
        foreach ($produk as $key => $value) { ?>
          <tr class="<?= $value['stok'] == 0 ? "bg bg-danger" : ""  ?>">
            <td><?= $no++ ?></td>
            <td><?= $value['kode_produk'] ?></td>
            <td><?= $value['nama_produk'] ?></td>
            <td><?= $value['nama_kategori'] ?></td>
            <td><?= $value['nama_satuan'] ?></td>
            <td>Rp. <?= number_format($value['harga_beli'],0) ?></td>
            <td>Rp. <?= number_format($value['harga_jual'],0) ?></td>
            <td><?= $value['stok'] ?></td>
            <td>
            <button data-toggle="modal" data-target="#edit<?= $value['id_produk'] ?>" class="btn btn-sm btn-warning">Edit</button>
            <button data-toggle="modal" data-target="#delete<?= $value['id_produk'] ?>" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        <?php } ?>
        </tbody>
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
<!-- /.card -->

<!-- Modal ADD -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
      <?php echo form_open('produk/add')?>
        <div class="form-group">
          <label>Kode Produk</label>
          <input class="form-control" value="<?= old('kode_produk') ?>" name="kode_produk" placeholder="Kode Produk" required>
        </div>

        <div class="form-group">
          <label>Nama Produk</label>
          <input class="form-control" value="<?= old('nama_produk') ?>" name="nama_produk" placeholder="Nama Produk" required>
        </div>

        <div class="form-group">
          <label>Kategori</label>
          <select name="id_kategori" class="form-control"> 
            <option value=''>Pilih Kategori</option>
            <?php foreach ($kategori as $key => $value) { ?>
              <option value='<?= $value['id_kategori'] ?>'><?= $value['nama_kategori'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Satuan</label>
          <select name="id_satuan" class="form-control"> 
            <option value=''>Pilih Satuan</option>
            <?php foreach ($satuan as $key => $value) { ?>
              <option value='<?= $value['id_satuan'] ?>'><?= $value['nama_satuan'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Harga Beli</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"></i>Rp.</span>
              </div>
          
            <input value="<?= old('harga_beli') ?>" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli" required>
          </div>
        </div>

        <div class="form-group">
          <label>Harga Jual</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"></i>Rp.</span>
            </div>
            
            <input value="<?= old('harga_jual') ?>" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual">
          </div>
        </div>

        <div class="form-group">
          <label>Stok</label>
          <input value="<?= old('stok') ?>" class="form-control" type="number" name="stok" placeholder="Stok" required>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      <?php echo form_close()?>
      </div>
     
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- Modal ADD -->

<!-- Modal Edit -->
<?php
  foreach ($produk as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value['id_produk'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Produk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
        <div class="modal-body">
        <?php echo form_open('produk/update/'.$value['id_produk'])?>
          <div class="form-group">
            <label>Kode Produk</label>
            <input class="form-control" value="<?= $value['kode_produk'] ?>" name="kode_produk" placeholder="Kode Produk" readonly>
          </div>

          <div class="form-group">
            <label>Nama Produk</label>
            <input class="form-control" value="<?=  $value['nama_produk'] ?>" name="nama_produk" placeholder="Nama Produk" required>
          </div>

          <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control"> 
              <option value=''>Pilih Kategori</option>
              <?php foreach ($kategori as $key => $k) { ?>
                <option value='<?= $k['id_kategori'] ?>' <?= $value['id_kategori'] == $k['id_kategori'] ? 'Selected' : '' ?>><?= $k['nama_kategori'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Satuan</label>
            <select name="id_satuan" class="form-control"> 
              <option value=''><?= $value['nama_satuan'] ?></option>
              <?php foreach ($satuan as $key => $s) { ?>
                <option value='<?= $s['id_satuan'] ?>' <?= $value['id_satuan'] == $s['id_satuan'] ? 'Selected' : '' ?>><?= $s['nama_satuan'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Harga Beli</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"></i>Rp.</span>
                </div>
            
              <input value="<?=  $value['harga_beli'] ?>" class="form-control" id="harga_beli<?= $value['id_produk'] ?>" name="harga_beli" placeholder="Harga Beli" required>
            </div>
          </div>

          <div class="form-group">
            <label>Harga Jual</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"></i>Rp.</span>
              </div>
              
              <input value="<?= $value['harga_jual'] ?>" class="form-control" id="harga_jual<?= $value['id_produk'] ?>" name="harga_jual" placeholder="Harga Jual">
            </div>
          </div>

          <div class="form-group">
            <label>Stok</label>
            <input value="<?= $value['stok'] ?>" class="form-control" type="number" name="stok" placeholder="Stok" required>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

        <?php echo form_close()?>
        </div>
      
      </div>
      <!-- /.modal-content -->
    </div>
  </div>
<?php } ?>
<!-- Modal Edit -->

<!-- Modal Hapus -->

<?php foreach ($produk as $key => $value){?>
<div class="modal fade" id="delete<?=  $value['id_produk']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin menghapus <?=  $value['nama_produk']; ?> ?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('produk/delete/'.$value['id_produk']) ?>" type="submit" class="btn btn-outline-light">Iya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<?php } ?>

<!-- Modal Hapus -->

<script>
  new AutoNumeric('#harga_beli', {
    digitGroupSeparator : ',',
    decimalPlaces: 0,
    
  });
  new AutoNumeric('#harga_jual', {
    digitGroupSeparator : ',',
    decimalPlaces: 0,

  });

  <?php
  foreach ($produk as $key => $value) { ?>
    new AutoNumeric('#harga_beli<?= $value['id_produk'] ?>', {
    digitGroupSeparator : ',',
    decimalPlaces: 0,
      
    });
    new AutoNumeric('#harga_jual<?= $value['id_produk'] ?>', {
      digitGroupSeparator : ',',
      decimalPlaces: 0,

    });
  <?php } ?>
</script>





