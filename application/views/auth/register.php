<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= isset($title) ? $title : 'AdminLTF 3' ?> | KomunitascodinG</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<!-- register -->
<div class="col-md-12 hold-transition register-page">
	<div class="register-box">
		<!-- <div class="card-body register-card-body"> -->
		<h5 class="login-box-msg">Regiatrasi</h5>

		<form action="" method="POST">
			<div class="input-group">
				<input type="text" name="name" class="form-control" value="<?= set_value('name'); ?>" placeholder="Nama Lengkap" autofocus>
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-user"></span>
					</div>
				</div>
			</div>
			<?= form_error('name'); ?>
			<div class="input-group mt-3">
				<input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>" placeholder="Email">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-envelope"></span>
					</div>
				</div>
			</div>
			<?= form_error('email'); ?>
			<div class="input-group mt-3">
				<input type="password" name="password" class="form-control" placeholder="Password min 8 karakter">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-lock"></span>
					</div>
				</div>
			</div>
			<?= form_error('password'); ?>
			<div class="input-group mt-3">
				<input type="password" name="password1" class="form-control" placeholder="Konfirmasi Password ">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-lock"></span>
					</div>
				</div>
			</div>
			<?= form_error('password1'); ?>
			<div class="row">
				<div class="mt-3 col-12">
					<button type="submit" class="btn btn-primary btn-block">Register</button>
				</div>
			</div>
		</form>

		<div class="social-auth-links text-center">
			<a href="#" class="btn btn-block btn-danger">
				<i class="fab fa-google-plus mr-2"></i>
				Login pakai Google
			</a>
		</div>

		<a href="<?= base_url('auth') ?>" class="text-center">Sudah punya AKUN</a>
	</div>
	<!-- /.form-box -->
</div><!-- /.card -->
</div>
<!-- akhir register -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
</body>

</html>