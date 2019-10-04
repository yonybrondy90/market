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
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

	<header class="main-header">
		<!-- Logo -->
		<a href="<?php echo base_url(); ?>dashboard" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>M&F</b></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Tienda M&F</b></span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">

					<li class="info-user">
		              Usuario, <?php echo $this->session->userdata("user"); ?>
		            </li>
		            <li>
						<a href="<?php echo base_url(); ?>auth/logout" title="Cerrar Sesion" id="logout">
							<img src="<?php echo base_url(); ?>assets/backend/images/logout.png" alt="Cerrar Session" >
						</a>
					</li>
										<!-- Control Sidebar Toggle Button -->

				</ul>
			</div>
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!--- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">MENU DE NAVEGACION</li>
				<li>
                    <a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> <span>Inicio</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>backend/categories"><i class="fa fa-home"></i> <span>Categorias</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>backend/products"><i class="fa fa-home"></i> <span>Productos</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>backend/providers"><i class="fa fa-home"></i> <span>Proveedores</span></a>
                </li>
				<li class="<?php echo $this->uri->segment(2) === "prestamos" ? 'active' : '' ?> treeview">
		          	<a href="#">
		            	<i class="fa fa-share-alt" aria-hidden="true"></i>
		            	<span>Libros</span>
		            	<span class="pull-right-container">
		              		<i class="fa fa-angle-left pull-right"></i>
		            	</span>
		          	</a>
		          	<ul class="treeview-menu">
		            	<li class="<?php echo $this->uri->segment(3) === "add" ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>libros/add"><i class="fa fa-circle-o"></i> Registrar Libro</a></li>
		            	<li class="<?php echo $this->uri->segment(3) === "pending" ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>libros"><i class="fa fa-circle-o"></i> Catalogo de Libros</a></li>
		            	<li class="<?php echo $this->uri->segment(3) === "pending" ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>categorias"><i class="fa fa-circle-o"></i> Categorias</a></li>
		          	</ul>
		        </li>
		        
		    </ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Main content -->

		<?php echo $content; ?>

		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 2.3.12
		</div>
		<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
		reserved.
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

