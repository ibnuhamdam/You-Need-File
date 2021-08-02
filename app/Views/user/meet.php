   <?= $this->extend('templates/index') ?>

   <?= $this->section('content') ?>

   <section class="rapat container">
       <div class="row">
           <div class="col-12">
               <ul class="nav nav-pills row" id="pills-tab" role="tablist">
                   <li class="nav-item text-center col-6" role="presentation">
                       <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Upcoming</a>
                   </li>
                   <li class="nav-item text-center col-6" role="presentation">
                       <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Completed</a>
                   </li>
               </ul>
               <div class="tab-content" id="pills-tabContent">
                   <div class="tab-pane fade show active p-3" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                       <div class="card border-0 mt-4">
                           <a href="<?= base_url('user/meet/1') ?>">
                               <div class="card-body">
                                   <div class="row">
                                       <div class="col-9">
                                           <p>Diskusi DD Rehabilitasi Rawa Jombor</p>
                                           <div class="row tanggal">
                                               <div class="col-2" style="align-content: center; display: grid">
                                                   <img src="<?= base_url(); ?>/icon/calendar.svg" style="width: 13px" class="img-fluid" alt="" />
                                               </div>
                                               <div class="col-10 text-left p-0">
                                                   <p>18 July 2021 <span class="text-jam"> 14:00 WIB </span></p>
                                               </div>
                                           </div>
                                           <div class="row ruangan">
                                               <div class="col-2" style="align-content: center; display: grid">
                                                   <img src="<?= base_url(); ?>/icon/location.svg" style="width: 13px" class="img-fluid" alt="" />
                                               </div>
                                               <div class="col-10 text-left p-0">
                                                   <p>Ruang Rapat KPI SDA</p>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-3">
                                           <span class="badge bg-primary px-2">KPI SDA</span>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                       <div class="card border-0 mt-4">
                           <a href="<?= base_url('user/meet/1') ?>">
                               <div class="card-body">
                                   <div class="row">
                                       <div class="col-9">
                                           <p>Diskusi DD Rehabilitasi Rawa Jombor</p>
                                           <div class="row tanggal">
                                               <div class="col-2" style="align-content: center; display: grid">
                                                   <img src="<?= base_url(); ?>/icon/calendar.svg" style="width: 13px" class="img-fluid" alt="" />
                                               </div>
                                               <div class="col-10 text-left p-0">
                                                   <p>18 July 2021 <span class="text-jam"> 14:00 WIB </span></p>
                                               </div>
                                           </div>
                                           <div class="row ruangan">
                                               <div class="col-2" style="align-content: center; display: grid">
                                                   <img src="<?= base_url(); ?>/icon/location.svg" style="width: 13px" class="img-fluid" alt="" />
                                               </div>
                                               <div class="col-10 text-left p-0">
                                                   <p>Ruang Rapat KPI SDA</p>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-3">
                                           <span class="badge bg-primary px-2">O&P SDA</span>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                       <div class="card border-0 mt-4">
                           <a href="<?= base_url('user/meet/1') ?>">
                               <div class="card-body">
                                   <div class="row">
                                       <div class="col-9">
                                           <p>Diskusi DD Rehabilitasi Rawa Jombor</p>
                                           <div class="row tanggal">
                                               <div class="col-2" style="align-content: center; display: grid">
                                                   <img src="<?= base_url(); ?>/icon/calendar.svg" style="width: 13px" class="img-fluid" alt="" />
                                               </div>
                                               <div class="col-10 text-left p-0">
                                                   <p>18 July 2021 <span class="text-jam"> 14:00 WIB </span></p>
                                               </div>
                                           </div>
                                           <div class="row ruangan">
                                               <div class="col-2" style="align-content: center; display: grid">
                                                   <img src="<?= base_url(); ?>icon/location.svg" style="width: 13px" class="img-fluid" alt="" />
                                               </div>
                                               <div class="col-10 text-left p-0">
                                                   <p>Ruang Rapat KPI SDA</p>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-3">
                                           <span class="badge bg-primary px-2">TU BBWS</span>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
                   <div class="tab-pane fade p-3" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                       <div class="card border-0 mt-4">
                           <a href="<?= base_url('user/meet/1') ?>">
                               <div class="card-body">
                                   <div class="row">
                                       <div class="col-9">
                                           <p>Diskusi DD Rehabilitasi Rawa Jombor</p>
                                           <div class="row tanggal">
                                               <div class="col-2" style="align-content: center; display: grid">
                                                   <img src="<?= base_url(); ?>/icon/calendar.svg" style="width: 13px" class="img-fluid" alt="" />
                                               </div>
                                               <div class="col-10 text-left p-0">
                                                   <p>18 July 2021 <span class="text-secondary"> 14:00 WIB </span></p>
                                               </div>
                                           </div>
                                           <div class="row ruangan">
                                               <div class="col-2" style="align-content: center; display: grid">
                                                   <img src="<?= base_url(); ?>/icon/location.svg" style="width: 13px" class="img-fluid" alt="" />
                                               </div>
                                               <div class="col-10 text-left p-0">
                                                   <p>Ruang Rapat KPI SDA</p>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-3">
                                           <span class="badge bg-secondary px-2">KPI SDA</span>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

   <?= $this->endSection(); ?>