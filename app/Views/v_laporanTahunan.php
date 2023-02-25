<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-sm-5">
          <div class="form-group">
            <label>Tahun</label>
            <div class="col-10 input-group">
              <select name="tahun" id="tahun" class="form-control">
                <option value="">Tahun</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
              </select>
              <span class="input-group-append">
                <button
                  onclick="ViewTabelLaporan()"
                  class="btn btn-primary btn-flat"
                  data-toggle="modal"
                  data-target="#cari-produk"
                >
                  <i style="color: white" class="fas fa-file-alt"></i>
                </button>
                <button
                 class="btn btn-success btn-flat"
                 onclick="PrintLaporan()"
                 >
                  <i class="fas fa-print"></i>
                </button>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-12">
          <hr>
          <div class="Tabel">
          

          </div>
        </div>
        
      </div>
      
    </div>
    <!-- /.card-body -->
  </div>
</div>

<script>
  function ViewTabelLaporan() {
   
    let tahun = $('#tahun').val();
    if (tahun=='') {
      Swal.fire('Tahun Belum Dipilih!!');
    }else{
      $.ajax({
      type: "POST",
      url: "<?= base_url('Laporan/ViewLaporanTahunan') ?>",
      data: {
        tahun: tahun,
      },
      dataType: "JSON",
      success: function(response) {
        if (response.data) {
          $('.Tabel').html(response.data);
        }
      }

    });
    }
    
  }

  function PrintLaporan() {
    let tahun = $('#tahun').val();
    if (tahun=='') {
      Swal.fire('Tahun Belum Dipilih!!');
    }else{
     NewWin=window.open('<?= base_url('Laporan/PrintLaporanTahunan') ?>/'+tahun,'NewWin','toolbar=no' );
    }
  }
</script>



