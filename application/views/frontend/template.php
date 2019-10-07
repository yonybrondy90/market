<!DOCTYPE html>
<html lang="ES">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TIENDA M&F - <?php echo $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/sweetalert/sweetalert.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/alertify/themes/alertify.core.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/alertify/themes/alertify.default.css">
	<!-- SweetAlert -->
	<script src="<?php echo base_url(); ?>assets/backend/sweetalert/sweetalert.js"></script>
	<!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bootstrap-datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/style.css">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/backend/images/favicon.png"/>
</head>
<body class="layout-top-nav skin-red">
<div class="wrapper">
	<header class="main-header">
	    <nav class="navbar navbar-static-top">
	      	<div class="container">
		        <div class="navbar-header">
		          	<a href="<?php echo base_url(); ?>" class="navbar-brand"><b>Tienda M&F</b></a>
		          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
		            	<i class="fa fa-bars"></i>
		          	</button>
		        </div>

	        	<!-- Collect the nav links, forms, and other content for toggling -->
	        	<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
			        <ul class="nav navbar-nav">
			            <li class="active"><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
			            <li><a href="#">Pedidos</a></li>
			            
			        </ul>
	        	</div>
	        	<!-- /.navbar-collapse -->
	        	<!-- Navbar Right Menu -->
	        	
	        	<!-- /.navbar-custom-menu -->
	      	</div>
	      	<!-- /.container-fluid -->
	    </nav>
	</header>
	  <!-- Full Width Column -->
	<div class="content-wrapper">
	    <div class="container">
	      <!-- Main content -->
	      	<section class="content">
	   
	        	<div class="box box-default">
	         	 	
	          		<div class="box-body">
	          			
	            		<?php echo $content ?>
	          		</div>
	          	<!-- /.box-body -->
	        	</div>
	        <!-- /.box -->
	      	</section>
	      	<!-- /.content -->
	    </div>
	    <!-- /.container -->
	</div>
	  <!-- /.content-wrapper -->
	<footer class="main-footer">
	    <div class="container">
	      	<div class="pull-right hidden-xs">
	        	<b>Version</b> 2.4.13
	      	</div>
	      	<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
	      	reserved.
	    </div>
	    <!-- /.container -->
	</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/backend/jquery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/backend/bootstrap/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/backend/dist/js/demo.js"></script>
<script>
	var base_url = "<?php echo base_url();?>";
</script>

<script src="<?php echo base_url(); ?>assets/backend/alertify/lib/alertify.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/backend/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/es.js"></script>
<!-- Datepicker -->
<script src="<?php echo base_url(); ?>assets/backend/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>

<script src="<?php echo base_url(); ?>assets/backend/js/script.js"></script>


</body>
</html>

