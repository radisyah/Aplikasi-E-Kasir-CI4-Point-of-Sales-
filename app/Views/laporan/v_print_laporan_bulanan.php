<div class="col-12 ">
  <table class="table table-bordered table-striped">
    <tr class="text-center bg-gray">
      <th>No</th>
      <th>Tanggal</th>
      <th>Total</th>
      <th>Untung</th>
    </tr>
    <?php $no=1; 
      foreach ($databulan as $key => $value) { 
        $grandtotal[] = $value['total_harga'];
        $granduntung[] = $value['untung'];
      ?>
    
      <tr class="text-center">
        <td><?=$no++?></td>
        <td><?=$value['tgl_jual']?></td>
        <td>Rp. <?= number_format($value['total_harga'],0)?></td>
        <td>Rp. <?= number_format($value['untung'],0)?></td>
      </tr>
      <?php } ?>
      <tr class="text-center bg-gray">
        <td class="tg-0lax" colspan="2"><h5>Grand Total</h5></td>
        <td class="tg-0lax">Rp. <?= $databulan == null ? '' : number_format(array_sum($grandtotal),0)  ?></td>
        <td class="tg-0lax">Rp. <?= $databulan == null ? '' : number_format(array_sum($granduntung),0)  ?></td>
      
      </tr>
  </table>
</div>

