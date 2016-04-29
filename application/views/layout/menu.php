 <div class="header-top">
	   <div class="wrap"> 
			 <div class="cssmenu">			 	
				<ul>
					<?php if ($this->session->userdata('username')) { ?>
					<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Hi <?= $this->session->userdata('username'); ?></a></li>
					<?php } ?>
					<?php if ($this->session->userdata('group') == '1') { ?>
					<li><a href="<?= base_url(); ?>dashboard"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp; Go to Dashboard</a></li>
					<?php } ?>
					<?php if ($this->session->userdata('username')) { ?>
					<li><?= anchor('logout', '<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Keluar'); ?></li>
			        <?php } else { ?>
    				<li><?= anchor('login', '<i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; Masuk'); ?></li>
    				<li><?= anchor('registration', '<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Daftar'); ?></li>
      				<?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="<?= base_url() ?>"><img src="<?= base_url()."assets/template/"; ?>images/logo.png" alt=""/></a>
				</div>
				<div class="menu">
		            <ul class="megamenu skyblue">
						<li class="active grid">
							<?= anchor('/', 'Beranda'); ?>
						</li>
						<li class="active grid">
							<?= anchor('menu', 'Daftar Menu'); ?>
						</li>
						<?php if ($this->session->userdata('username')) { ?>
						<!-- <li class="active grid">
							<?= anchor('customer/payment_confirmation', 'Konfirmasi'); ?>
						</li> -->
						<li class="active grid">
							<?= anchor('customer/shopping_history', 'Riwayat Belanja'); ?>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
	    </div>
	    <div class="header-bottom-right">
	        <div class="search">	  
				<input type="text" name="s" class="textbox" value="Cari" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Cari';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
			</div>
	  		<div class="tag-list">
				<ul class="icon1 sub-icon1 profile_img">
					<li><a class="active-icon c2" href="<?= base_url() ?>home/cart"> </a>
						<ul class="sub-icon1 list">
							<li><h3><?= $this->cart->total_items() ?> Pesanan</h3><a href=""></a></li>
							<li><p>Klik tombol diatas untuk melihat isi keranjang.</a></p></li>
						</ul>
					</li>
				</ul>
	    		<ul class="last">
	    			<li>
	    				<a href="<?= base_url() ?>home/cart">Keranjang (<?= $this->cart->total_items(); ?>)</a>
    				</li>
				</ul>
	  		</div>
    	</div>
    	<div class="clear"></div>
    </div>