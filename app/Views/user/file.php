   <?= $this->extend('templates/index') ?>

   <?= $this->section('content') ?>

   <div class="file container">
       <div class="row">
           <div class="col-12">
               <div class="search">
                   <div class="input-group mb-3">
                       <span class="input-group-text" id="basic-addon1"><img src="<?= base_url(); ?>/icon/search.svg" alt="" /></span>
                       <input type="text" name="search" class="form-control search-input" placeholder="Cari file yang anda inginkan" aria-label="Username" aria-describedby="basic-addon1" />
                   </div>
               </div>

               <?php foreach ($files as $f) : ?>
                   <div class="meeting-file">
                       <h5><?= $f['nama_meet']; ?></h5>
                       <?php $no = 1;
                        if ($f['files']) {
                            foreach ($f['files'] as $df) : ?>
                               <div class="list-file mt-3">
                                   <div class="row">
                                       <div class="col-1 item">
                                           <?php if ($file_type === 'paparan') : ?>
                                               <img src="<?= base_url(); ?>/icon/file-pdf.svg" alt="" />
                                           <?php elseif ($file_type === 'dokumentasi') : ?>
                                               <i style="font-size: 18px;" class="fas fa-image text-primary"></i>
                                           <?php endif; ?>
                                       </div>
                                       <div class="col-10 item">
                                           <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $no ?>" class="ellipsed">
                                               <p><?= $df->nama; ?></p>
                                           </a>
                                       </div>
                                       <div class="col-1 item">
                                           <a href="#" class="" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                               <img src="<?= base_url(); ?>/icon/menu-item.svg" alt="" />
                                           </a>
                                           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                               <?php if ($file_type === 'dokumentasi') : ?>
                                                   <li class="mb-2">
                                                       <button style="font-family: 'Poppins-Regular'; font-size:12px;" type="button" class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $no ?>"><i class="fas fa-search-plus"></i> Lihat Gambar</button>
                                                   </li>
                                               <?php endif; ?>
                                               <li>
                                                   <a style="font-family: 'Poppins-Regular'; font-size:12px;" class="dropdown-item text-primary" href="<?= base_url('uploads/berkas') . '/' . $file_type . '/' . $df->nama; ?>" Download="Dokumentasi <?= $f['nama_meet'] . '-' . $no ?>"><i class="fas fa-download text-primary mr-3"></i> Download</a>
                                               </li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                               <!-- Modal -->
                               <div class="modal fade" id="exampleModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLabel">Dokumentasi <?= $f['nama_meet'] ?></h5>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                           </div>
                                           <div class="modal-body text-center">
                                               <img src="<?= base_url('uploads/berkas') . '/' . $file_type . '/' . $df->nama; ?>" class="img-fluid" alt="">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           <?php $no++;
                            endforeach;
                        } else { ?>
                           <div class="list-file mt-3">
                               <div class="row">
                                   <div class="col-11 item text-center">
                                       <p>Belum Terdapat File <?= $file_type ?> </p>
                                   </div>
                               </div>
                           </div>
                       <?php } ?>
                   </div>
               <?php endforeach; ?>
           </div>
       </div>
   </div>

   <?= $this->endSection(); ?>