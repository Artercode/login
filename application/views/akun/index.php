<!-- data akun -->
<div class="content-wrapper">
	<!-- ########## judul ########## -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="font-weight-bold text-gray"><i class="mx-1 far fa-fw fa-id-badge"></i>Data Akun</h3>
				</div>
				<!-- info -->
				<div class="h2 col-sm-6">
					<a class="float-sm-right" href="" id="dropdown" data-toggle="dropdown">
						<i class="mx-1 fas fa-fw fa-exclamation-circle"></i>
					</a>
					<!-- Dropdown info -->
					<div class="p-4 dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dropdown">
						<h6>Data Akun :</h6>
						<h6>Rencana update:</h6>
						<h6>-bagian edit belum.</h6>
						<h6>-map yang outomatis set sesuai alamat</h6>
						<h6>-checkbox dan nama tidak pas tengah baris</h6>
						<h6>-checkbox untuk privat/public</h6>
						<h6>-sidebar active kalau di klik</h6>
						<h6>resposibel</h6>
						<h6>crop foto supaya sesuai kebutuhan</h6>

					</div>
				</div>
				<!-- akhir info -->
			</div>
		</div>
	</section>
	<!-- ### akhir judul ### -->

	<!-- ########## isi data akun ########## -->
	<div class="mt-n2 col-lg-11 container-fluid">
		<div class="row">

			<div class="col col-md-3">
				<!-- ########## foto dan edit password ########## -->
				<div class="card">
					<img src="images/user/<?= $user['foto']; ?>" alt="" height="" class="p-2 card-img-top">

					<div class="card-footer">
						<div class="input-group-append">
							<button class="btn btn-primary">Edit</button>
						</div>
					</div>
				</div>
				<button type="submit" class="col-lg btn btn-danger" onclick="return confirm('Hati-hati! AKUN anda akan terhapus dari database dan tidak dapat digunakan lagi. Click OK untuk hapus.')">Hapus Akun</button>
			</div>
			<div class="col-md-9">
				<!-- ########## data akun ########## -->
				<div class="card">
					<div class="card-header border-transparent">
						<h3 class="pt-1 card-title">Data akun - [lama bergabung] - <?= date('d F Y', $user['date_created']); ?></h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>

					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table m-0">
								<tbody>
									<!-- nama -->
									<tr>
										<td>
											<div class="icheck-primary d-inline">
												<input type="checkbox" id="checkboxPrimary1" checked>
												<label for="checkboxPrimary1"></label>
											</div>
										</td>
										<td>
											<h5>Nama</h5>
										</td>
										<td>
											<form action="" method="POST">
												<div class="input-group">
													<input type="text" name="name" id="name" value="<?= $user['name']; ?>" class="form-control" placeholder="">
													<div class="input-group-append">
														<button type="submit" class="btn btn-primary" onclick="return confirm('Click, OK untuk edit.')">Edit</button>
													</div>
												</div>
											</form>
										</td>
									</tr>
									<!-- alamat -->
									<tr>
										<td>
											<div class="icheck-primary d-inline">
												<input type="checkbox" id="checkboxPrimary2" checked>
												<label for="checkboxPrimary2"></label>
											</div>
										</td>
										<td>
											<h5>Alamat</h5>
										</td>
										<td>
											<form action="" method="POST">
												<div class="input-group">
													<input type="text" name="address" value="<?= $user['address']; ?>" class="form-control" placeholder="">
													<div class="input-group-append">
														<button type="submit" class="btn btn-primary" onclick="return confirm('Click, OK untuk edit.')">Edit</button>
													</div>
												</div>
											</form>
										</td>
									</tr>
									<!-- kota -->
									<tr>
										<td>
											<div class="icheck-primary d-inline">
												<input type="checkbox" id="checkboxPrimary3">
												<label for="checkboxPrimary3"></label>
											</div>
										</td>
										<td>
											<h5>Kota</h5>
										</td>
										<td>
											<form action="" method="POST">
												<div class="input-group">
													<input type="text" name="kota" value="<?= $user['kota']; ?>" class="form-control" placeholder="">
													<div class="input-group-append">
														<button type="submit" class="btn btn-primary" onclick="return confirm('Click, OK untuk edit.')">Edit</button>
													</div>
												</div>
											</form>
										</td>
									</tr>
									<!-- propinsi -->
									<tr>
										<td>
											<div class="icheck-primary d-inline">
												<input type="checkbox" id="checkboxPrimary3">
												<label for="checkboxPrimary3"></label>
											</div>
										</td>
										<td>
											<h5>Propinsi</h5>
										</td>
										<td>
											<form action="" method="POST">
												<div class="input-group">
													<input type="text" name="propinsi" value="<?= $user['propinsi']; ?>" class="form-control" placeholder="">
													<div class="input-group-append">
														<button type="submit" class="btn btn-primary" onclick="return confirm('Click, OK untuk edit.')">Edit</button>
													</div>
												</div>
											</form>
										</td>
									</tr>
									<!-- handphone -->
									<tr>
										<td>
											<div class="icheck-primary d-inline">
												<input type="checkbox" id="checkboxPrimary4" checked>
												<label for="checkboxPrimary1"></label>
											</div>
										</td>
										<td>
											<h5>Handphone</h5>
										</td>
										<td>
											<form action="" method="POST">
												<div class="input-group">
													<input type="numeric" name="handphone" value="<?= $user['handphone']; ?>" class="form-control" placeholder="">
													<div class="input-group-append">
														<button type="submit" class="btn btn-primary" onclick="return confirm('Click, OK untuk edit.')">Edit</button>
													</div>
												</div>
											</form>
										</td>
									</tr>
									<!-- email -->
									<tr>
										<td>
											<div class="icheck-primary d-inline">
												<input type="checkbox" id="checkboxPrimary5" checked>
												<label for="checkboxPrimary1"></label>
											</div>
										</td>
										<td>
											<h5>Email</h5>
										</td>
										<td>
											<form action="" method="POST">
												<div class="input-group">
													<input type="text" name="email" value="<?= $user['email']; ?>" class="form-control" readonly>
												</div>
											</form>
										</td>
									</tr>
									<!-- password lama-->
									<tr>
										<td></td>
										<td>
											<h5>Password Lama</h5>
										</td>
										<td>
											<div class="input-group">
												<input type="password" name="passwordLama" class="form-control" placeholder="Password Lama">
											</div>
										</td>
									</tr>
									<!-- password baru-->
									<tr>
										<td></td>
										<td>
											<h5>Password Baru</h5>
										</td>
										<td>
											<div class="input-group">
												<input type="password" name="passwordBaru" class="form-control" placeholder="Password Baru">
											</div>
										</td>
									</tr>
									<!-- konfirmasi password-->
									<tr>
										<td></td>
										<td>
											<h5>konfirmasi Password</h5>
										</td>
										<td>
											<div class="input-group">
												<input type="password" name="konPassword" class="form-control" placeholder="Konfirmasi Password">
												<div class="input-group-append">
													<button type="submit" class="btn btn-primary" onclick="return confirm('Click, OK untuk edit.')">Edit</button>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br><br>
			</div>
		</div>
	</div>
	<!-- ### akhir isi data akun ### -->
</div>
<!-- akhir data akun -->