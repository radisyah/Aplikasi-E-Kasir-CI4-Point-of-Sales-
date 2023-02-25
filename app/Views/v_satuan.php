<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Satuan</h3>
        <div class="card-tools">
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
      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th width="50px">No</th>
            <th>Satuan</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
       
        <tbody>
        <?php $no=1; 
        foreach ($satuan as $key => $value) { ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['nama_satuan'] ?></td>
            <td>
            <button data-toggle="modal" data-target="#edit<?= $value['id_satuan'] ?>" class="btn btn-sm btn-warning">Edit</button>
            <button data-toggle="modal" data-target="#delete<?= $value['id_satuan'] ?>" class="btn btn-sm btn-danger">Delete</button>
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

<!-- Modal Add.Kategori -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Satuan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('satuan/add')?>
        <div class="form-group">
          <label>Nama Satuan</label>
          <input class="form-control" name="nama_satuan" placeholder="Nama Satuan" required>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR modal-ADD -->

<!-- Modal EDIT -->
<?php foreach ($satuan as $key => $value){?>
<div class="modal fade" id="edit<?=  $value['id_satuan']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Satuan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('satuan/update/'.$value['id_satuan']) ?>
        <div class="form-group">
          <label>Ubah Satuan</label>
          <input class="form-control" value="<?=  $value['nama_satuan']; ?>" name="nama_satuan" placeholder="Nama Satuan" required>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR  -->
<?php } ?>

<!-- Modal EDIT.Hapus -->
<?php foreach ($satuan as $key => $value){?>
<div class="modal fade" id="delete<?=  $value['id_satuan']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Satuan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin menghapus <?=  $value['nama_satuan']; ?> ?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('satuan/delete/'.$value['id_satuan']) ?>" type="submit" class="btn btn-outline-light">Iya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR modal-Hapus -->
<?php } ?>
