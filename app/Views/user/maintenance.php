   <?= $this->extend('templates/index') ?>

   <?= $this->section('content') ?>

   <section class="maintenance container">
       <div class="row wrapper-hero">
           <div class="col-auto hero text-center">
               <img src="<?= base_url(); ?>/img/development.svg" width="100%" height="300" alt="" />
           </div>
           <div class="col-auto maintenance-text text-center">
               <div class="wrapper-text my-auto">
                   <h3>Sorry </h3>
                   <p>This feature is currently under development, please be kind patient to see for the next update</p>
               </div>
               <a href="<?= previous_url(); ?>">
                   <div class="arrow start-50 translate-middle">
                       <img src="<?= base_url(); ?>/icon/left-arrow-white.svg" width="40" class="img-fluid mx-auto d-block" alt="" />
                   </div>
               </a>
           </div>
       </div>
   </section>

   <?= $this->endSection(); ?>