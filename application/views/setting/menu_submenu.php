<!-- menu & submenu -->
<div class="content-wrapper">
   <!-- Sidebar  -->
   <?php $this->load->view('layouts/_sidebar'); ?>
   <!-- akhir sidebar -->

   <!-- ########## judul ########## -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-6">
               <h3 class="font-weight-bold text-gray"><i class="mx-1 far fa-fw fa-folder"></i> Menu & Submenu</h3>
            </div>
            <!-- info -->
            <div class="h2 col-sm-6">
               <a class="float-sm-right" href="" id="dropdown" data-toggle="dropdown">
                  <i class="fas fa-fw fa-exclamation-circle"></i>
               </a>
               <!-- Dropdown info -->
               <div class="p-4 dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dropdown">
                  <h6>SEMUA HARUS DIISI DENGAN BENAR</h6>
                  <h6>Menu :</h6>
                  <h6>- Menu merupakan bagian yang boleh diakses sesuai Level atau jabatan.</h6>
                  <h6>- Menu adalah link di sidebar.</h6>
                  <h6>- menu ID berisi angka 1, 2, dst harus berurut dan tidak ada angka yang terlewat, supaya nanti mudah untuk mengelolanya, bila ada yang salah sebaiknya di edit saja untuk nama level atau jabatannya.</h6>
                  <h6>- Menu Title adalah nama dari menu di sidebar</h6>
                  <h6>- Menu ID & Menu Title tidak boleh sama.</h6>
                  <h6>Submenu :</h6>
                  <h6>- Submenu adalah bagian dari menu.</h6>
                  <h6>- Menu ID untuk menentukan submenu bagian dari menu apa.</h6>
                  <h6>- Active untuk mengaktifkan hak akses.</h6>
                  <h6>- Submenu Title adalah nama yang ditampilkan di sidebar.</h6>
               </div>
            </div>
            <!-- akhir info -->
         </div>
      </div>
   </section>
   <!-- ### akhir judul ### -->

   <div class="col-lg-11 container-fluid">
      <?php $this->load->view('layouts/_alert') ?>
      <!-- #################### menu ####################################################### -->
      <div class=" mt-n2 ml-n2 col-lg-8">
         <!-- tabel menu -->
         <div class="card">
            <div class="card-header">
               <h1 class="card-title">Menu</h1>
               <div class="card-tools">
                  <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#menuModal"><i class="mr-1 fas fa-fw fa-plus-circle"></i>Menu</a>
               </div>
            </div>

            <div class="card-body p-0">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <!-- <th width="60px">No</th> -->
                        <th class="text-center" width="100px">Menu ID</th>
                        <th>Menu Title</th>
                        <th>Icon</th>
                        <th width="80px"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1;
                     foreach ($menu as $mn) : ?>
                        <tr>
                           <!-- <th class="text-center"><?= $no++; ?></th> -->
                           <td class="text-center"><?= $mn['menu_id']; ?></td>
                           <td><?= $mn['menu_title']; ?></td>
                           <td><?= $mn['menu_icon']; ?></td>
                           <td>
                              <a href="<?= base_url() ?>setting/editMenu/<?= $mn['id']; ?>" class="text-success" data-toggle="modal" data-target="#editMenuModal"><i class="far fa-fw fa-edit"></i></a>
                              <a href="<?= base_url() ?>setting/hapusMenu/<?= $mn['id']; ?>" class="text-danger" onclick=" return confirm('yakin dihapus ?');"><i class="far fa-fw fa-trash-alt"></i></a>
                           </td>
                        </tr>
                     <?php endforeach ?>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- akhir tabel level-->
      </div>
      <!-- ### akhir menu ### -->

      <!-- #################### submenu #################################################### -->
      <div class="mt-5 ml-n2 col-lg">
         <!-- tabel submenu-->
         <div class="card">
            <div class="card-header">
               <h1 class="card-title">Submenu</h1>
               <div class="card-tools">
                  <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#submenuModal"><i class="mr-1 fas fa-fw fa-plus-circle"></i>Submenu</a>
               </div>
            </div>

            <div class="card-body p-0">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <!-- <th width="60px">No</th> -->
                        <th class="text-center" width="100px">Menu ID</th>
                        <th>Submenu Title</th>
                        <th>URL</th>
                        <th>Icon</th>
                        <th class="text-center">akses</th>
                        <th width="80px"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1;
                     foreach ($submenu as $sm) : ?>
                        <tr>
                           <!-- <th><?= $no++; ?></th> -->
                           <td class="text-center"><?= $sm['menu_id']; ?></td>
                           <td><?= $sm['submenu_title']; ?></td>
                           <td><?= $sm['url']; ?></td>
                           <td><?= $sm['submenu_icon']; ?></td>
                           <td class="text-center"><?= $sm['is_access']; ?></td>
                           <td>
                              <a href="<?= base_url() ?>setting/editSubmenu/<?= $sm['id']; ?>" class="text-success" data-toggle="modal" data-target="#editSubmenuModal"><i class="far fa-fw fa-edit"></i></a>
                              <a href="<?= base_url() ?>setting/hapusSubmenu/<?= $sm['id']; ?>" class="text-danger" onclick=" return confirm('yakin dihapus ?');"><i class="far fa-fw fa-trash-alt"></i></a>
                           </td>
                        </tr>
                     <?php endforeach ?>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- akhir tabel submenu-->
      </div>
      <!-- ### akhir submenu ### -->
   </div>
   <br><br>
</div>
<!-- *************************************************************************************** -->
<!-- ******************** LEVEL & MENU AKSES *********************************************** -->
<!-- ########## modal tambah menu ########## -->
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="menuModalLabel"><i class="fas fa-fw fa-plus-circle"></i> Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('setting/tambahMenu'); ?>" method="post">
            <!-- isi Modal -->
            <div class="modal-body">
               <div class="form-group">
                  <input type="numeric" name="menu_id" id="menu_id" class="form-control" placeholder="Menu ID - harus berupa angka">
               </div>
               <div class="form-group">
                  <input type="text" name="menu_title" id="menu_title" class="form-control" placeholder="Menu Title - harus huruf besar semua">
               </div>
               <div class="form-group">
                  <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon">
               </div>
            </div>
            <!-- akhir isi modal -->
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus-circle"></i> Menu</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- ### akhir modal tambah menu ### -->

<!-- ########## modal edit menu ########## -->
<div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editMenuModalLabel"><i class="far fa-fw fa-edit"></i> Edit Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('setting/editMenu'); ?>" method="post">
            <!-- isi Modal -->
            <div class="modal-body">
               <div class="form-group">
                  <label for="">Menu ID</label>
                  <input type="text" name="menu_id" id="menu_id" class="form-control" value="">
               </div>
               <div class="form-group">
                  <label for="">Menu Title</label>
                  <input type="text" name="menu" id="menu" class="form-control" value="">
               </div>
               <div class="form-group">
                  <label for="">Icon</label>
                  <input type="text" name="icon" id="icon" class="form-control" value="">
               </div>
            </div>
            <!-- akhir isi modal -->
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="far fa-fw fa-edit"></i> Edit Menu</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- ### akhir modal edit menu ### -->


<!-- ************************************************************************************** -->
<!-- ******************** MENU & SUBMENU ************************************************** -->
<!-- ########## modal tambah submenu ########## -->
<div class="modal fade" id="submenuModal" tabindex="-1" role="dialog" aria-labelledby="submenuModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="submenuModalLabel"><i class="fas fa-fw fa-plus-circle"></i> Submenu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('setting/tambahSubmenu'); ?>" method="post">
            <!-- isi Modal -->
            <div class="modal-body">
               <div class="form-group">
                  <input type="numaric" name="menu_id" id="menu_id" class="form-control" placeholder="Menu ID - harus berupa angka">
               </div>
               <div class="form-group">
                  <input type="text" name="submenu_title" id="submenu_title" class="form-control" placeholder="Submenu Title">
               </div>
               <div class="form-group">
                  <input type="text" name="url" id="url" class="form-control" placeholder="URL">
               </div>
               <div class="form-group">
                  <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon">
               </div>
            </div>
            <!-- akhir isi modal -->
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus-circle"></i> Submenu</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- ### akhir modal tambah submenu ### -->

<!-- ########## modal edit submenu ########## -->
<div class="modal fade" id="editSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="editSubmenuModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editSubmenuModalLabel"><i class="far fa-fw fa-edit"></i> Edit Submenu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('setting/editSubmenu'); ?>" method="post">
            <!-- isi Modal -->
            <div class="modal-body">
               <div class="form-group">
                  <label for="">Menu ID</label>
                  <input type="numaric" name="menu_id" id="menu_id" class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="">Submenu Title</label>
                  <input type="text" name="submenu_title" id="submenu_title" class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="">URL</label>
                  <input type="text" name="url" id="url" class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="">Icon</label>
                  <input type="text" name="icon" id="icon" class="form-control" placeholder="">
               </div>
               <div class="form-group">
                  <label for="">Active</label>
                  <input type="text" name="is_active" id="is_active" class="form-control" placeholder="">
               </div>
            </div>
            <!-- akhir isi modal -->
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="far fa-fw fa-edit"></i> Edit Submenu</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- ### akhir modal edit submenu ### -->