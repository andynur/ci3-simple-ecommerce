<div class="login">
  <div class="wrap">
    <div class="col_1_of_login span_1_of_login">
      <h4 class="title">Pelanggan Baru</h4>
      <p>Untuk Anda yang belum menjadi pelanggan Pizza Hot Delivery, silahkan mendaftar dengan cara mengklik tombol dibawah ini.</p>
      <div class="button1">
         <?= anchor('auth/register', '<input type="submit" name="Submit" value="Buat Akun">')?>
       </div>
       <div class="clear"></div>
    </div>
    <div class="col_1_of_login span_1_of_login">
    <div class="login-title">
            <h4 class="title">FORM MASUK PELANGGAN</h4>
      <div id="loginbox" class="loginbox">
        <form action="login" method="post" id="login-form">
          <fieldset class="input">
            <?php $error = form_error("username", "<p style='margin-left: 0;' class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
            <p id="login-form-username">
              <label for="modlgn_username">Username</label>
              <input id="modlgn_username" type="text" name="username" class="inputbox" size="18" autocomplete="off" value="<?= set_value('username'); ?>">
            </p>
            <?php echo $error; ?>

            <?php $error = form_error("password", "<p style='margin-left: 0;' class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
            <p id="login-form-password">
              <label for="modlgn_passwd">Password</label>
              <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
            </p>
            <?php echo $error; ?>

            <div class="remember">
              <p id="login-form-remember">
                <label for="modlgn_remember"><a href="#">Lupa Password Anda ? </a></label>
             </p>
              <input type="submit" name="Submit" class="button" value="Masuk"><div class="clear"></div>
           </div>
          </fieldset>
         </form>
      </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
