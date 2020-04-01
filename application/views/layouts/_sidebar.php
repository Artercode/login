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
				<li class="nav-header mt-n1 text-center">MENU</li>
				<!-- ********** menyiapkan data menu ********** -->
				<?php
				$level_id = $user['level_id'];
				$queryMenu = 	" SELECT `user_menu`.*, `menu_title`
										 FROM `user_menu` JOIN `user_access_menu`
											ON `user_menu`.`menu_id` = `user_access_menu`.`menu_id`
										WHERE `user_access_menu`. `level_id` = $level_id
									ORDER BY `user_access_menu`. `menu_id` ASC
									";
				$menu = $this->db->query($queryMenu)->result_array();
				?>
				<!-- looping menu -->
				<?php foreach ($menu as $m) : ?>
					<li class="nav-item has-treeview menu-open">
						<a href="" class="nav-link active">
							<i class="nav-icon <?= $m['menu_icon']; ?>"></i>
							<p>
								<?= $m['menu_title']; ?>
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>

						<!-- ########## menyiapkan data submenu sesuai menu_id ########## -->
						<?php
						$menuId = $m['menu_id'];
						$querySubmenu = "SELECT * 
                         FROM  `user_submenu` JOIN `user_menu`
                           ON  `user_submenu`. `menu_id` = `user_menu`.`menu_id`
                        WHERE  `user_submenu`. `menu_id` = $menuId
                          AND  `user_submenu`. `is_access` = 1
                     ";
						$submenu = $this->db->query($querySubmenu)->result_array();
						?>
						<!-- looping submenu - foreach dalam foreach -->
						<?php foreach ($submenu as $sm) : ?>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url($sm['url']); ?>" class="nav-link">
										<i class="nav-icon <?= $sm['submenu_icon']; ?>"></i>
										<p><?= $sm['submenu_title']; ?></p>
									</a>
								</li>
							</ul>
						<?php endforeach; ?>
						<!-- akhir looping submenu -->

					</li>
				<?php endforeach; ?>
				<!-- akhir looping menu -->
			</ul>
		</nav>
		<!-- akhir sidebar menu -->
	</div>
</aside>
<!-- akhir sidebar -->