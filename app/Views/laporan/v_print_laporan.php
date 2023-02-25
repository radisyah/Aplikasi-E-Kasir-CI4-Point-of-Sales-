<div class="col-12 ">
  <table id="example1" class="table table-bordered table-striped text-center">
    <thead>
      <tr >
        <th width="50px">No</th>
        <th>Id Produk</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
        <th>Satuan</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
      </tr>
    </thead>
    
    <tbody>
    <?php $no=1; 
    foreach ($produk as $key => $value) { ?>
      <tr class="<?= $value['stok'] == 0 ? "text-danger" : ""  ?>">
        <td><?= $no++ ?></td>
        <td><?= $value['kode_produk'] ?></td>
        <td><?= $value['nama_produk'] ?></td>
        <td><?= $value['nama_kategori'] ?></td>
        <td><?= $value['nama_satuan'] ?></td>
        <td>Rp. <?= number_format($value['harga_beli'],0) ?></td>
        <td>Rp. <?= number_format($value['harga_jual'],0) ?></td>
        <td><?= $value['stok'] ?></td>
      </tr>
    <?php } ?>
    </tbody>
    <b>Print Date : <?= date('d M Y H:i:s') ?> <b>
    
  </table>
</div>