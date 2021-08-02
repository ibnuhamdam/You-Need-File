   <?= $this->extend('templates/index') ?>

   <?= $this->section('content') ?>

   <section class="main container">
       <div class="row wrapper-hero">
           <div class="col-auto hero text-center">
               <img src="<?= base_url(); ?>/img/welcome.png" class="img-fluid" alt="" />
               <a href="<?= base_url('user'); ?>">
                   <div class="arrow position-absolute start-50 translate-middle">
                       <img src="<?= base_url(); ?>/icon/arrow.svg" class="img-fluid mx-auto d-block" alt="" />
                   </div>
               </a>
           </div>
           <div class="col-auto welcome-text text-center">
               <div class="wrapper-text my-auto">
                   <h3>Welcome !</h3>
                   <p>Kelola berkas berkas rapat dengan mudah dan nyaman dalam satu aplikasi</p>
               </div>
           </div>
       </div>
   </section>

   <?= $this->endSection(); ?>