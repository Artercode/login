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

<!-- login -->
<div class="col-md-12 hold-transition login-page">
	<div class="login-box">
		<!-- <div class="card-body login-card-body rounded"> -->
		<h5 class="login-box-msg">Login</h5>
		<?= $this->session->flashdata('message'); ?>
		<form action="<?= base_url('auth') ?>" method="POST">
			<div class="input-group">
				<input type="email" name="email" id="email" class="form-control" value="<?= set_value('email'); ?>" placeholder="Email" autofocus>
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-envelope"></span>
					</div>
				</div>
			</div>
			<?= form_error('email', '<small class="text-danger font-italic">', '</small>'); ?>
			<div class="input-group mt-3">
				<input type="text" name="password" class="form-control" placeholder="Password">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-lock"></span>
					</div>
				</div>
			</div>
			<?= form_error('password', '<small class="text-danger font-italic">', '</small>'); ?>
			<div class="row">
				<div class="mt-3 col-12">
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</div>
			</div>
		</form>
		<h6>email : admin@mail.com - password : 12341234</h6>
		<div class="social-auth-links text-center mt-3">
			<a href="#" class="btn btn-block btn-danger">
				<i class="fab fa-google-plus mr-2"></i> Login pakai Google
			</a>
		</div>

		<p class="mb-1">
			<a href="<?= base_url('') ?>">Lupa password</a>
		</p>
		<p class="mb-0">
			<a href="<?= base_url('auth/register') ?>" class="text-center">Registrasi</a>
		</p>
	</div>
</div>
</div>
<!-- akhir login -->


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