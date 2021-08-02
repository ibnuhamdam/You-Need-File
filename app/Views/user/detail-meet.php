   <?= $this->extend('templates/index') ?>

   <?= $this->section('content') ?>

   <section class="detail-rapat container">
       <div class="row wrapper-informasi">
           <div class="col-12">
               <h5>Diskusi DD Rehabilitasi Rawa Jombor</h5>
               <div class="row tanggal mb-3">
                   <div class="col-2" style="align-content: center; display: grid">
                       <img src="<?= base_url(); ?>/icon/calendar.svg" class="img-fluid mx-auto d-block" alt="" />
                   </div>
                   <div class="col-10 text-left p-0">
                       <p>18 July 2021 <span class="text-jam"> 14:00 WIB </span></p>
                   </div>
               </div>
               <div class="row ruangan">
                   <div class="col-2" style="align-content: center; display: grid">
                       <img src="<?= base_url(); ?>/icon/location.svg" class="img-fluid mx-auto d-block" alt="" />
                   </div>
                   <div class="col-10 text-left p-0">
                       <p>Ruang Rapat KPI SDA</p>
                   </div>
               </div>
               <div class="intansi mt-4">
                   <p>Instansi Pengundang : <b> BBWS Bengawan Solo</b></p>
               </div>
               <div class="link mt-4">
                   <p>
                       Meeting Link : <br />
                       <a target="__blank" href="zoommtg://zoom.us/join?confno=82017903045&pwd=UPIBS&zc=0&browser=firefox&uname=BBWS%20Bengawan%20Solo"> https://us02web.zoom.us/j/2593029185?pwd=YWwrUVhIRGJKbmN4M1lYbzRidDFsUT09</a>
                   </p>
                   <p class="mt-3">Meeting Id : <b> 5762 654 276 </b></p>
                   <p class="mt-2">Meeting Pass : <b> 78654 </b></p>
               </div>
               <div class="undangan mt-4" style="flex-direction: row; display: flex; align-items: center">
                   <img src="<?= base_url(); ?>/icon/file-pdf.svg" class="img-fluid mx-auto d-block" alt="" />
                   <p style="margin-left: 8px">Undangan-Rapat Diskusi DD Rehabilitasi Rawa Jombor.pdf</p>
               </div>
           </div>
       </div>
   </section>

   <?= $this->endSection(); ?>