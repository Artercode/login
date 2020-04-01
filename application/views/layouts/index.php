<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title; ?></title>
	<!-- <title><?= isset($title) ? $title : 'AdminLTF 3' ?> | Komunitas Coding</title> -->
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
	<!-- Tempusdominus Bbootstrap 4 -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
	<!-- iCheck - cek box -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css"> -->
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
	<!-- Daterange picker -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css"> -->
	<!-- summernote -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css"> -->
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('layouts/_navbar'); ?>
		<!-- akhir navbar -->

		<!-- Sidebar  -->
		<?php $this->load->view('layouts/_sidebar'); ?>
		<!-- akhir sidebar -->

		<!-- Content home -->
		<?php $this->load->view($page); ?>
		<!-- akhir content home -->

		<footer class="main-footer">
			51119 Bebas dicontek &copy; 2019-<?= date('Y') ?> Komunitascoding. <strong><a href="https://github.com/Artercode/komunitascoding" target="_black" class="ml-1"><i class="fab fa-fw fa-github"></i> Github</a></strong>
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 3.0.2
			</div>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery - logout dorplist-->
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<!-- <script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script> -->
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<!-- <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script> -->
	<!-- Sparkline -->
	<!-- <script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script> -->
	<!-- JQVMap -->
	<!-- <script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script> -->
	<!-- <script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
	<!-- jQuery Knob Chart -->
	<!-- <script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script> -->
	<!-- daterangepicker -->
	<!-- <script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script> -->
	<!-- <script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script> -->
	<!-- Tempusdominus Bootstrap 4 -->
	<!-- <script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
	<!-- Summernote -->
	<!-- <script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script> -->
	<!-- overlayScrollbars -->
	<!-- <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<!-- <script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script> -->
	<!-- AdminLTE for demo purposes -->
	<!-- <script src="<?= base_url() ?>assets/dist/js/demo.js"></script> -->

	<!-- jquery checkbox - menu_akses.php -->
	<script>
		// cari form-ckeck-input - saat click jalankan fungsi ..
		$('.form-check-input').on('click', function() {
			// ambil data dari menu_akses.php - menu_id dan level_id di bagian form-check-input
			const levelId = $(this).data('level');
			const menuId = $(this).data('menu');
			// jalankan ajax
			$.ajax({
				url: "<?= base_url('setting/ubah_akses'); ?>", // ubah_akses ada di setting.php
				type: 'post',
				data: { // data object
					levelId: levelId,
					menuId: menuId
				},
				// ketika berhasil diarahkan ke halaman menu_akses.php
				success: function() {
					document.location.href = "<?= base_url('setting/menu_akses/'); ?>" + levelId;
				}
			});
		});
	</script>
</body>

</html>