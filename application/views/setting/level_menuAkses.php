<!-- level -->
<div class="content-wrapper">
   <!-- Sidebar  -->
   <?php $this->view('layouts/_sidebar'); ?>
   <!-- akhir sidebar -->

   <!-- ########## judul ########## -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-6">
               <h3 class="font-weight-bold text-gray"><i class="mx-1 fas fa-fw fa-user-lock"></i> Level & Menu Akses</h3>
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
      <?php $this->load->view('layouts/_alert') ?>
      <div class="mt-n2 row">
         <!-- ########## Level ########## -->
         <div class="col-lg-6">
            <?= form_error('level_id') ?>
            <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
            <!-- <?php if (validation_errors()) : ?>
               <div class="alert alert-danger alert-dismissible fate show" role="alert">
                  <?= validation_errors(); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            <?php endif; ?> -->
            <!-- tabel level  -->
            <div class="card">
               <div class="card-header">
                  <h1 class="card-title">Level</h1>
                  <div class="card-tools">
                     <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#levelModal"><i class="mr-1 fas fa-fw fa-plus-circle"></i>Level</a>
                  </div>
               </div>

               <div class="card-body p-0">
                  <table class="table table-hover ">
                     <thead>
                        <tr>
                           <!-- <th width="60px">No</th> -->
                           <th class="text-center" width="100px">Level ID</th>
                           <th>Level</th>
                           <th width="40px"></th>
                           <th width="80px"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1;
                        foreach ($level as $lv) : ?>
                           <tr>
                              <!-- <th class="text-center"><?= $no++; ?></th> -->
                              <td class="text-center"><?= $lv['level_id']; ?></td>
                              <td><?= $lv['level']; ?></td>
                              <td>
                                 <a href="<?= base_url('setting/menu_akses/') . $lv['level_id']; ?>" class="badge badge-warning">Akses</a>
                              </td>
                              <td>
                                 <a href="<?= base_url(); ?>setting/editLevel/<?= $lv['id']; ?>" class="text-success" data-toggle="modal" data-target="#editLevelModal"><i class="far fa-fw fa-edit"></i></a>
                                 <a href="<?= base_url(); ?>setting/hapusLevel/<?= $lv['id']; ?>" class="text-danger" onclick=" return confirm('yakin dihapus ?');"><i class="far fa-fw fa-trash-alt"></i></a>
                              </td>
                           </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- akhir tabel level -->
         </div>
         <!-- ### akhir level ### -->
      </div>
   </div>
</div>
<!-- akhir level -->
<!-- #################### LEVEL ############################################################## -->
<!-- ########## modal tambah level ########## -->
<div class="modal fade" id="levelModal" tabindex="-1" role="dialog" aria-labelledby="levelModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="levelModalLabel"><i class="fas fa-fw fa-plus-circle"></i> Level</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('setting/tambahLevel'); ?>" method="post">
            <!-- isi Modal -->
            <div class="modal-body">
               <div class="form-group">
                  <input type="numeric" name="level_id" id="level_id" class="form-control" placeholder="Level_ID - harus berupa angka">
               </div>
               <div class="form-group">
                  <input type="text" name="level" id="level" class="form-control" placeholder="Nama Level">
               </div>
            </div>
            <!-- akhir isi modal -->
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus-circle"></i> Level</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- ### akhir modal tambah level ### -->

<!-- ########## modal edit level ########## -->
<div class="modal fade" id="editLevelModal" tabindex="-1" role="dialog" aria-labelledby="editLevelModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editLevelModalLabel"><i class="far fa-fw fa-edit"></i> Edit Level</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url(); ?>setting/editLevel" method="post">
            <!-- <input type="hidden" name="id" value="<?= $leveldata['id']; ?>"> -->
            <!-- isi Modal -->
            <div class="modal-body">
               <div class="form-group">
                  <label for="">Level ID</label>
                  <input type="numeric" name="level_id" id="level_id" class="form-control" value="">
               </div>
               <div class="form-group">
                  <label for="">Level</label>
                  <input type="text" name="level" id="level" class="form-control" value="">
               </div>
            </div>
            <!-- akhir isi modal -->
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary"><i class="far fa-fw fa-edit"></i> Edit Level</button>
            </div>
         </form>
      </div>
   </div>
</div>