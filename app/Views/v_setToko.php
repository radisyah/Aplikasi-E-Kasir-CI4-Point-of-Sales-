<div class="container-fluid">
  <div class="col-md-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">My Toko</h3>
      </div>
      <?php 
      if(session()->getFlashdata('pesanSukses')){
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success! - ';
        echo session()->getFlashdata('pesanSukses');
        echo '</h5></div>';
      }
      ?>
      <?php echo form_open(base_url('SettingToko/UpdateSetting')) ?>
        <div class="card-body box-profile">
        <div class="form-group">
          <label>Nama Toko</label>
          <input  name="nama_toko" value="<?= $toko['nama_toko'] ?>" class="form-control" />
        </div>
        <div class="form-group">
          <label>No Telp</label>
          <input name="no_telp" value="<?= $toko['no_telp'] ?>" class="form-control"  />
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input name="alamat" value="<?= $toko['alamat'] ?>"  class="form-control"  />
        </div>
        <div class="form-group">
          <label>Slogan</label>
          <input name="slogan" value="<?= $toko['slogan'] ?>"  class="form-control"  />
        </div>
        <div class="form-group">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control"><?= $toko['deskripsi'] ?> </textarea>
        </div>
      
        <button type="submit" href="#" class="btn btn-primary btn-block"><b>Edit</b></button type="submit">
      </div>    
      <!-- /.card-body -->
    <?php echo form_close() ?>
    </div>

  </div>
</div>
