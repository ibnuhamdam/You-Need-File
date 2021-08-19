   <?= $this->extend('templates/index') ?>

   <?= $this->section('content') ?>

   <section class="detail-rapat container">
       <div class="row wrapper-informasi">
           <div class="col-12">
               <h5><?= $meeting['nama'] ?></h5>
               <div class="row tanggal mb-3">
                   <div class="col-2" style="align-content: center; display: grid">
                       <img src="<?= base_url(); ?>/icon/calendar.svg" class="img-fluid mx-auto d-block" alt="" />
                   </div>
                   <div class="col-10 text-left p-0">
                       <p><?= $meeting['tanggal'] ?> <span class="text-jam"> <?= $meeting['jam'] ?> WIB </span></p>
                   </div>
               </div>
               <div class="row ruangan">
                   <div class="col-2" style="align-content: center; display: grid">
                       <img src="<?= base_url(); ?>/icon/location.svg" class="img-fluid mx-auto d-block" alt="" />
                   </div>
                   <div class="col-10 text-left p-0">
                       <p><?= $meeting['tempat'] ?></p>
                   </div>
               </div>
               <div class="intansi mt-4">
                   <p>Instansi Pengundang : <b> <?= $meeting['pengundang'] ?></b></p>
               </div>
               <div class="link mt-4">
                   <p>
                       Meeting Link : <br />
                       <a target="__blank" href="zoomus://zoom.us/join?confno=<?= $meeting['meet_id'] ?>&pwd=<?= $meeting['meet_pass'] ?>&zc=0&browser=chrome&uname=BBWS%20Bengawan%20Solo"> <?= $meeting['link'] ?></a>
                   </p>
                   <p class="mt-3">Meeting Id : <b> <?= $meeting['meet_id'] ?> </b></p>
                   <p class="mt-2">Meeting Pass : <b> <?= $meeting['meet_pass'] ?> </b></p>
               </div>
               <a href="<?= base_url('uploads/undangan') . '/' . $meeting['undangan'] ?>" download="Undangan <?= $meeting['nama'] ?>">
                   <div class="undangan mt-4" style="flex-direction: row; display: flex; align-items: center">
                       <img src="<?= base_url(); ?>/icon/file-pdf.svg" class="img-fluid mx-auto d-block" alt="" />
                       <p style="margin-left: 8px" class="nav-link text-primary">Undangan-Rapat <?= $meeting['nama'] ?>.pdf</p>
                   </div>
               </a>
               <a href="zoomus://zoom.us/join?confno=<?= $meeting['meet_id'] ?>&pwd=<?= $meeting['meet_pass'] ?>&zc=0&browser=chrome&uname=BBWS%20Bengawan%20Solo">
                   <div class="d-grid gap-2">
                       <button class="btn btn-primary" type="button"> <i class="fas fa-video mr-3"></i> Join Zoom Meeting</button>
                   </div>
               </a>
           </div>
       </div>
   </section>

   <?= $this->endSection(); ?>