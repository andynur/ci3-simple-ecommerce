<div class="register_account">
	<div class="wrap">
		<h4 class="title">Buat Akun Baru</h4>
		<?= form_open('auth/register/'); ?> 
			<div class="col_1_of_2 span_1_of_2">                
				<div>
                    <?php $error = form_error("username", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
             		 <input type="text" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                     <?php echo $error; ?>
             	</div>
             	<div>
                    <?php $error = form_error("fullname", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
             		 <input type="text" name="fullname" placeholder="Nama Lengkap" value="<?= set_value('fullname'); ?>">
                     <?php echo $error; ?>
         		</div>
        		<div>
                    <?php $error = form_error("email", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
             		 <input type="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">             
                     <?php echo $error; ?>		 
         		</div>         		
         		<div>
                    <?php $error = form_error("password", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
             		 <input type="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
                     <?php echo $error; ?>
         		</div>
         		<div>
                     <?php $error = form_error("confirm", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
             		 <input type="password" name="confirm" placeholder="Konfirmasi Password" value="<?= set_value('confirm'); ?>">
                     <?php echo $error; ?>
         		</div>
			</div>
			<div class="col_1_of_2 span_1_of_2">
         		<div>
                     <?php $error = form_error("address", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
             		 <textarea name="address" placeholder="Alamat Lengkap" rows="7" style="margin-bottom: 8px;"><?= set_value('address') ?></textarea>
                     <?php echo $error; ?>
         		</div>
         		<div>
                     <?php $error = form_error("phone", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
             		 <input type="text" name="phone" placeholder="No Hp" value="<?= set_value('phone'); ?>">             		 
                     <?php echo $error; ?>             		          		 
             	</div>
         		<div>
                     <?php $error = form_error("zip", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
             		 <input type="text" name="zip" placeholder="Kode Pos" value="<?= set_value('zip'); ?>">             	
                     <?php echo $error; ?>	 
				</div>         		
			</div>
			<div class="clear"></div>
			<div style="margin-top: 10px;">
				<button class="grey">Daftar</button>
				<p class="terms">
					Dengan meng-klik 'Daftar' Anda setuju dengan <a href="#">Syarat &amp; Ketentuan</a>.
				</p>
			</div>
			<div class="clear"></div>
		</form>
	</div>
</div>