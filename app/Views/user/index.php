   <?= $this->extend('templates/index') ?>

   <?= $this->section('content') ?>

   <div class="home">
       <section class="home-profile container">
           <div class="row">
               <div class="col-3">
                   <a href="<?= base_url('user/profile') . '/' . user()->id ?>">
                       <div class="rounded-circle text-center ava">
                           <img src="<?= base_url(); ?>/uploads/<?= user()->user_image ?>" class="rounded-circle mx-auto d-block" alt="" style="width: 50px;height: 50px;" />
                       </div>
                   </a>
               </div>
               <div class="col-9 welcome p0">
                   <div class="wrapper my-auto">
                       <h3>Welcome</h3>
                       <p><?= (user()->full_name ? user()->full_name : user()->username) ?></p>
                   </div>
               </div>
           </div>
       </section>

       <div class="search">
           <div class="input-group mb-3">
               <span class="input-group-text" id="basic-addon1"><img src="<?= base_url(); ?>/icon/search.svg" alt="" /></span>
               <input type="text" name="search" class="form-control search-input" placeholder="Cari file yang anda inginkan" aria-label="Username" aria-describedby="basic-addon1" />
           </div>
       </div>

       <section class="fitur container">
           <div class="row">
               <div class="col-6 wrapper" style="padding-right: calc(var(--bs-gutter-x) * 0.4) !important; padding-left: calc(var(--bs-gutter-x) * 0.4) !important">
                   <a href="<?= base_url('maintenance') ?>">
                       <div class="list-fitur text-center">
                           <img src="<?= base_url(); ?>/icon/form.svg" class="img-fluid mx-auto" alt="" />
                           <p>list of attendees</p>
                       </div>
                   </a>
               </div>
               <div class="col-6 wrapper">
                   <a href="<?= base_url('user/file/Documentation/dokumentasi') ?>">
                       <div class="list-fitur text-center">
                           <img src="<?= base_url(); ?>/icon/documentation.svg" class="img-fluid mx-auto" alt="" />
                           <p>Documentation</p>
                       </div>
                   </a>
               </div>
               <div class="col-6 wrapper mt-4" style="padding-right: calc(var(--bs-gutter-x) * 0.4) !important; padding-left: calc(var(--bs-gutter-x) * 0.4) !important">
                   <a href="<?= base_url('user/file/Presentation materials/paparan') ?>">
                       <div class="list-fitur text-center">
                           <img src="<?= base_url(); ?>/icon/paparan.svg" class="img-fluid mx-auto" alt="" />
                           <p>Presentation materials</p>
                       </div>
                   </a>
               </div>
               <div class="col-6 wrapper mt-4">
                   <a href="<?= base_url('maintenance') ?>">
                       <div class="list-fitur text-center">
                           <img src="<?= base_url(); ?>/icon/berita-acara.svg" class="img-fluid mx-auto" alt="" />
                           <p>Minutes of meeting</p>
                       </div>
                   </a>
               </div>
           </div>
       </section>
   </div>

   <?= $this->endSection(); ?>