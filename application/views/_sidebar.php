<!-- sidebar  -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- brand logo -->
	<a href="" class="brand-link">
		<img src="<?= base_url() ?>images/user/<?= $user['foto']; ?>" class="brand-image img-circle elevation-3" alt="User Image">
		<span class="brand-text font-weight-light"><?= $user['name']; ?></span>
	</a>

	<div class="sidebar">
		<!-- sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-header">MENU</li>
				<!-- akun -->
				<li class="nav-item has-treeview menu-open">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-user"></i>
						<p>
							AKUN
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('akun') ?>" class="nav-link">
								<i class="nav-icon far fa-id-badge"></i>
								<p>Profile</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- data -->
				<li class="nav-item has-treeview menu-open">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-database"></i>
						<p>
							DATA
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('admin/tabel_user') ?>" class="nav-link">
								<i class="nav-icon fas fa-table"></i>
								<p>Tabel User</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- setting -->
				<li class="nav-item has-treeview menu-open">
					<a href="" class="nav-link active">
						<i class="nav-icon fas fa-cog"></i>
						<p>
							SETTING
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('setting/level_menuAkses') ?>" class="nav-link">
								<i class="nav-icon fas fa-user-lock"></i>
								<p>Level & Menu Akses</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('setting/menu_submenu') ?>" class="nav-link">
								<i class="nav-icon far fa-folder"></i>
								<p>Menu & Submenu</p>
							</a>
						</li>

					</ul>
				</li>
			</ul>
		</nav>
		<!-- akhir sidebar menu -->
	</div>
</aside>
<!-- akhir sidebar -->