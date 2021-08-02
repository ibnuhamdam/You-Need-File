   <?= $this->extend('templates/index') ?>

   <?= $this->section('content') ?>
   <!-- Alert -->
   <?php if (session('update')) : ?>
       <div class="alert alert-success text-center" id="alert" role="alert"><?= session('update') ?></div>
   <?php endif; ?>
   <section class="profile">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="circle-out">
                       <div class="circle">
                           <img src="<?= base_url(); ?>/icon/person.svg" class="img-fluid mx-auto d-block" alt="" />
                       </div>
                   </div>
                   <div class="profile-name text-center">
                       <h3>
                           <?= (user()->full_name ? user()->full_name : user()->username) ?>
                       </h3>
                       <p><?= user()->email ?></p>
                   </div>
                   <div class="list-item">
                       <a href="<?= base_url('user/edit') . '/' . user()->id ?>">
                           <div class="list-edit row">
                               <div class="col-2">
                                   <img src="<?= base_url(); ?>/icon/profile-active.svg" class="img-fluid mx-auto d-block" alt="" />
                               </div>
                               <div class="col-8">
                                   <h5>Edit Profile</h5>
                                   <p>Edit Your Personal Information</p>
                               </div>
                               <div class="col-2">
                                   <img src="<?= base_url(); ?>/icon/right-arrow.svg" class="img-fluid mx-auto" alt="" />
                               </div>
                           </div>
                       </a>
                       <a href="#">
                           <div class="list-edit row">
                               <div class="col-2">
                                   <img src="<?= base_url(); ?>/icon/share.svg" class="img-fluid mx-auto d-block" alt="" />
                               </div>
                               <div class="col-8">
                                   <h5>Share This App</h5>
                                   <p>Share This App</p>
                               </div>
                               <div class="col-2">
                                   <img src="<?= base_url(); ?>/icon/right-arrow.svg" class="img-fluid mx-auto" alt="" />
                               </div>
                           </div>
                       </a>
                       <?php if (in_groups('admin')) : ?>
                           <a href="<?= base_url('admin') ?>">
                               <div class="list-edit row">
                                   <div class="col-2">
                                       <img src="<?= base_url(); ?>/icon/obeng.svg" class="img-fluid mx-auto d-block" alt="" />
                                   </div>
                                   <div class="col-8">
                                       <h5>Admin</h5>
                                       <p>Access to Admin Pages</p>
                                   </div>
                                   <div class="col-2">
                                       <img src="<?= base_url(); ?>/icon/right-arrow.svg" class="img-fluid mx-auto" alt="" />
                                   </div>
                               </div>
                           </a>
                       <?php endif; ?>
                       <a href="<?= base_url('logout') ?>">
                           <div class="list-edit row">
                               <div class="col-2">
                                   <img src="<?= base_url(); ?>/icon/logout.svg" class="img-fluid mx-auto d-block" alt="" />
                               </div>
                               <div class="col-8">
                                   <h5>Logout</h5>
                                   <p>From You Need Apps</p>
                               </div>
                               <div class="col-2">
                                   <img src="<?= base_url(); ?>/icon/right-arrow.svg" class="img-fluid mx-auto" alt="" />
                               </div>
                           </div>
                       </a>

                   </div>
               </div>
           </div>
       </div>
   </section>

   <?= $this->endSection(); ?>