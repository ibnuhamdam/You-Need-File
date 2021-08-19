   <?= $this->extend('templates/index') ?>

   <?= $this->section('content') ?>

   <section class="rapat container">
       <div class="row">
           <div class="col-12">
               <ul class="nav nav-pills row" id="pills-tab" role="tablist">
                   <li class="nav-item text-center col-6" role="presentation">
                       <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#upcoming" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Upcoming</a>
                   </li>
                   <li class="nav-item text-center col-6" role="presentation">
                       <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#completed" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Completed</a>
                   </li>
               </ul>
               <div class="tab-content" id="pills-tabContent">
                   <div class="tab-pane fade show active p-3" id="upcoming" role="tabpanel" aria-labelledby="upcoming">
                       <?php foreach ($upcoming as $u) : ?>
                           <div class="card border-0 mt-4">
                               <a href="<?= base_url('user/meet') . '/' . $u->id ?>">
                                   <div class="card-body">
                                       <div class="row">
                                           <div class="col-9">
                                               <p><?= $u->nama ?></p>
                                               <div class="row tanggal">
                                                   <div class="col-2" style="align-content: center; display: grid">
                                                       <img src="<?= base_url(); ?>/icon/calendar.svg" style="width: 13px" class="img-fluid" alt="" />
                                                   </div>
                                                   <div class="col-10 text-left p-0">
                                                       <p><?= $u->tanggal ?> <span class="text-jam"> <?= $u->jam ?> WIB </span></p>
                                                   </div>
                                               </div>
                                               <div class="row ruangan">
                                                   <div class="col-2" style="align-content: center; display: grid">
                                                       <img src="<?= base_url(); ?>/icon/location.svg" style="width: 13px" class="img-fluid" alt="" />
                                                   </div>
                                                   <div class="col-10 text-left p-0">
                                                       <p><?= $u->tempat ?></p>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-3">
                                               <span class="badge bg-primary px-2"><?= $u->bidang ?></span>
                                           </div>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       <?php endforeach; ?>
                   </div>
                   <div class="tab-pane fade p-3" id="completed" role="tabpanel" aria-labelledby="pills-profile-tab">
                       <?php foreach ($completed as $c) : ?>
                           <div class="card border-0 mt-4">
                               <a href="<?= base_url('user/meet') . '/' . $c->id ?>">
                                   <div class="card-body">
                                       <div class="row">
                                           <div class="col-9">
                                               <p><?= $c->nama ?></p>
                                               <div class="row tanggal">
                                                   <div class="col-2" style="align-content: center; display: grid">
                                                       <img src="<?= base_url(); ?>/icon/calendar.svg" style="width: 13px" class="img-fluid" alt="" />
                                                   </div>
                                                   <div class="col-10 text-left p-0">
                                                       <p><?= $c->tanggal ?> <span class="text-jam"> <?= $c->jam ?> WIB </span></p>
                                                   </div>
                                               </div>
                                               <div class="row ruangan">
                                                   <div class="col-2" style="align-content: center; display: grid">
                                                       <img src="<?= base_url(); ?>/icon/location.svg" style="width: 13px" class="img-fluid" alt="" />
                                                   </div>
                                                   <div class="col-10 text-left p-0">
                                                       <p><?= $c->tempat ?></p>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-3">
                                               <span class="badge bg-secondary px-2"><?= $c->bidang ?></span>
                                           </div>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       <?php endforeach; ?>
                   </div>
               </div>
           </div>
       </div>
   </section>

   <?= $this->endSection(); ?>