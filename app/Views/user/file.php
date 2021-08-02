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

               <!-- File -->
               <div class="meeting-file">
                   <h5>DD Penanganan Kali Anyar</h5>
                   <div class="list-file mt-3">
                       <div class="row">
                           <div class="col-1 item">
                               <img src="<?= base_url(); ?>/icon/small-form.svg" alt="" />
                           </div>
                           <div class="col-10 item">
                               <a href="#">
                                   <p>Daftar Hadir DD Penanganan Kali Anyar</p>
                               </a>
                           </div>
                           <div class="col-1 item">
                               <a href="#">
                                   <img src="<?= base_url(); ?>/icon/menu-item.svg" alt="" />
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- File -->
               <div class="meeting-file">
                   <h5>DD Penanganan Kali Anyar</h5>
                   <div class="list-file mt-3">
                       <div class="row">
                           <div class="col-1 item">
                               <img src="<?= base_url(); ?>/icon/small-form.svg" alt="" />
                           </div>
                           <div class="col-10 item">
                               <a href="#">
                                   <p>Daftar Hadir DD Penanganan Kali Anyar</p>
                               </a>
                           </div>
                           <div class="col-1 item">
                               <a href="#">
                                   <img src="<?= base_url(); ?>/icon/menu-item.svg" alt="" />
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <?= $this->endSection(); ?>