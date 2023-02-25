<table class="table table-bordered table-striped">
	<tr class="text-center bg-gray">
		<th>No</th>
		<th>Kode Produk</th>
		<th>Nama Produk</th>
		<th>Harga Beli</th>
		<th>Harga Jual</th>
		<th>Qty</th>
		<th>Total Harga</th>
		<th>Total Untung</th>
	</tr>
  <?php $no=1; 
    foreach ($dataharian as $key => $value) { 
      $grandtotal[] = $value['total_harga'];
      $granduntung[] = $value['untung'];
    ?>
   
    <tr class="text-center">
      <td><?=$no++?></td>
      <td><?=$value['kode_produk']?></td>
      <td><?=$value['nama_produk']?></td>
      <td>Rp. <?= number_format($value['modal'],0)?></td>
      <td>Rp. <?= number_format($value['harga'],0)?></td>
      <td><?=$value['qty']?></td>
      <td>Rp. <?= number_format($value['total_harga'],0)?></td>
      <td>Rp. <?= number_format($value['untung'],0)?></td>
    </tr>
    <?php } ?>
    <tr class="text-center bg-gray">
      <td class="tg-0lax" colspan="6"><h5>Grand Total</h5></td>
      <td class="tg-0lax">Rp. <?= $dataharian == null ? '' : number_format(array_sum($grandtotal),0)  ?></td>
      <td class="tg-0lax">Rp. <?= $dataharian == null ? '' : number_format(array_sum($granduntung),0)  ?></td>
    
    </tr>
</table>
