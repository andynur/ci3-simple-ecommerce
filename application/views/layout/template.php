<!DOCTYPE HTML>
<html>
<head>
<title><?= $page_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/x-icon" href="<?= base_url()."assets/"; ?>favicon.ico">
<link rel="stylesheet" href="<?= base_url()."assets/template/"; ?>css/style.css">
<link rel="stylesheet" href="<?= base_url()."assets/template/"; ?>css/form.css">
<link rel="stylesheet" href="<?= base_url()."assets/"; ?>css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="<?= base_url()."assets/template/"; ?>css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<!--start slider -->
<link rel="stylesheet" href="<?= base_url()."assets/template/"; ?>css/fwslider.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/"; ?>css/sweetalert.css">
</head>
<body>
    <!-- menu -->
    <?php $this->load->view('layout/menu.php'); ?>

	<?php $this->load->view($main_view); ?>	

    <!-- footer -->
    <?php $this->load->view('layout/footer.php'); ?>