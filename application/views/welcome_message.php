<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>PizzaHot Delivery</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="<?= base_url()."assets/"; ?>favicon.ico">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?= base_url()."assets/adminlte/"; ?>bootstrap/css/bootstrap.min.css">
    <!-- Datatables-->
    <link rel="stylesheet" href="<?= base_url()."assets/"; ?>css/dataTables.bootstrap.css">    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url()."assets/"; ?>css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url()."assets/"; ?>css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url()."assets/adminlte/"; ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/adminlte/"; ?>dist/css/skins/skin-green.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/"; ?>css/sweetalert.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
	<?php $this->load->view('layout/top_menu'); ?>
	<h1>Order Now!</h1>

	<div class="row">
		<?php foreach ($products as $product) : ?>
		<div class="col-sm-3 col-md-3">
			<div class="thumbnail" style="padding: 20px 5px 5px 5px; text-align: center;">
				<?php 
				echo img([
						'src' 	=> 'uploads/' . $product->image,
						'style'	=> 'max-width: 100%; max-height: 100%; height: 100px;'
					 ]); 
				?>
				<div class="caption">
					<h3 style="margin:0 auto;"><?= $product->name; ?></h3>
					<p><?= $product->description; ?></p>
					<p>
						<?= anchor('welcome/add_to_cart/' . $product->id, 'Pesan', [
								'class'	=> 'btn btn-primary',
								'role'	=> 'button'
							]); ?>
					</p>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

    <script src="<?php echo base_url()."assets/"; ?>js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>js/datatables.min.js"></script>    
    <script src="<?php echo base_url()."assets/"; ?>js/dataTables.bootstrap.js"></script>        
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."assets/adminlte/"; ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets/adminlte/"; ?>dist/js/app.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>js/sweetalert.min.js"></script> 
</body>
</html>