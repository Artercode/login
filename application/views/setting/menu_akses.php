<!-- menu akses -->
<div class="content-wrapper">
   <!-- Sidebar  -->
   <?php $this->view('layouts/_sidebar'); ?>
   <!-- akhir sidebar -->

   <!-- ########## judul ########## -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-6">
               <h3 class="font-weight-bold text-gray"><i class="mx-1 fas fa-fw fa-user-lock"></i> Menu Akses</h3>
            </div>
            <!-- info -->
            <div class="h2 col-sm-6">
               <a class="float-sm-right" href="" id="dropdown" data-toggle="dropdown">
                  <i class="fas fa-fw fa-exclamation-circle"></i>
               </a>
               <!-- Dropdown info -->
               <div class="p-4 dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dropdown">
                  <h6>SEMUA HARUS DIISI DENGAN BENAR</h6>
                  <h6>Level :</h6>
                  <h6>- Tingkatan dari pengguna atau anggota.</h6>
                  <h6>- Level ID berisi angka 1, 2, dst harus berurut dan tidak ada angka yang terlewat, supaya nanti mudah untuk mengelolanya, bila ada yang salah sebaiknya di edit saja untuk nama level atau jabatannya.</h6>
                  <h6>- Level ID & Level Title tidak boleh sama.</h6>
                  <h6>- Diberi Level ID supaya kita dapat merubah nama jabatan, tanpa merubah semua jabatan di tabel lain.</h6>
                  <h6>Menu Akses :</h6>
                  <h6>- Untuk menentukan hak akses dari tiap-tiap level atau jabatan.</h6>
                  <h6>- Level ID usahakan berurutan supaya memudahkan mengecek.</h6>
                  <h6>- Level ID dan Menu ID semuanya harus berupa angka.</h6>
                  <h6>- Merubah hak akses sebaiknya dilakukan edit dan diurutkan kembali, hindari delete menu akses.</h6>

               </div>
            </div>
            <!-- akhir info -->
         </div>
      </div>
   </section>
   <!-- ### akhir judul ### -->

   <div class="col-lg-11 container-fluid">
      <div class="mt-n2 row">
         <!-- ########## menu ########## -->
         <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <!-- tabel menu -->
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Level : [<?= $level['level_id']; ?>] - <?= $level['level']; ?></h5>
                  <div class="card-tools">
                     <a href="<?= base_url('setting/level_menuAkses'); ?>" class="btn btn-sm float-right btn-primary">Kembali</a>
                  </div>
               </div>

               <div class="card-body p-0">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <!-- <th scope="col">#</th> -->
                           <th class="text-center" width="100px">Menu ID</th>
                           <th scope="col">Menu Title</th>
                           <th scope="col" width="80px">Akses</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                           <tr>
                              <!-- <th><?= $no++; ?></th> -->
                              <td class="text-center"><?= $m['menu_id']; ?></td>
                              <td><?= $m['menu_title']; ?></td>
                              <td class="text-center">
                                 <div class="form-check">
                                    <!-- check_akses ada di login_helper.php -->
                                    <!-- kirim data level_id dan menu_id ke jquery saat di check -->
                                    <!-- jquery untuk mengampil inputan - ajax ada di footer -->
                                    <input class="form-check-input" type="checkbox" <?= check_akses($level['level_id'], $m['menu_id']); ?> data-level="<?= $level['level_id']; ?>" data-menu="<?= $m['menu_id']; ?>">
                                 </div>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- akhir tabel menu -->
         </div>
         <!-- ### akhir menu akses ### -->

         <!-- ########## menu akses ########## -->
         <div class="col-lg-6">
            <!-- tabel menu akses-->
            <div class="card">
               <div class="card-header">
                  <h1 class="mb-2 card-title">Menu akses</h1>
                  <div class="card-tools">

                  </div>
               </div>

               <div class="card-body p-0">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <!-- <th width="60px">No</th> -->
                           <th class="text-center">Level ID</th>
                           <th class="text-center">Menu ID</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1;
                        foreach ($access_menu as $am) : ?>
                           <tr>
                              <!-- <th class="text-center"><?= $no++; ?></th> -->
                              <td class="text-center"><?= $am['level_id']; ?></td>
                              <td class="text-center"><?= $am['menu_id']; ?></td>
                           </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- akhir tabel menu akses-->
         </div>
         <!-- ### akhir menu akses ### -->
      </div>
   </div>
</div>
<!-- akhir menu akses -->