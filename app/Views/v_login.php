<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-card-body">
    <div class="login-logo">
      <a href=""><b>E-</b>Kasir</a>
    </div>

    <?php 
      if(session()->getFlashdata('pesanSukses')){
          echo '<div class="alert alert-success" role="alert">';
          echo session()->getFlashdata('pesanSukses');
          echo '</div>';
      }else if(session()->getFlashdata('pesanGagal')){
        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('pesanGagal');
        echo '</div>';
      }
    ?>
    

    <?php
    $errors = session()->getFlashdata('errors');
    if (!empty($errors)) { ?>
      <div class="alert alert-danger alert-dismissible">
        <ul>
          <?php foreach ($errors as $key => $error) { ?>
            <li><?= esc($error) ?></li>
          <?php } ?>
        </ul>
      </div>
    <?php } ?>

    <?php echo form_open('auth/cek_login')?>
    <div class="form-group">
      <input
        type="email"
        name="email"
        class="form-control"
        id="exampleInputEmail"
        aria-describedby="emailHelp"
        placeholder="Masukkan alamat email"
        autocomplete="off"
      />
     
    </div>
    <div class="form-group">
      <input
        type="password"
        name="password"
        class="form-control"
        id="exampleInputPassword"
        placeholder="Masukkan kata sandi"
      />
     
    </div>
    <div class="form-group">
      <!-- /.col -->
      <button
        type="submit"
        style="font-size: 16px"
        class="btn btn-primary btn-block"
      >
        Login
      </button>
      <!-- /.col -->
    </div>
    <?php echo form_close() ?>
    
  </div>
  <!-- /.login-card-body -->
</div>
