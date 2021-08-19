  <?= $this->extend('templates/index') ?>

  <?= $this->section('content') ?>

  <section class="edit-profile">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="circle-out">
                      <a href="#" id="btn-upload">
                          <img src="<?= base_url(); ?>/uploads/<?= $user->user_image; ?>" id="ava-img" class="img-fluid mx-auto img-ava" alt="" />
                          <div class="plus">
                              <img src="<?= base_url(); ?>/icon/plus.svg" class="img-fluid mx-auto d-block" alt="" />
                          </div>
                      </a>
                  </div>


                  <div class="form-input">
                      <form method="POST" action="<?= base_url('user/update/') . '/' . $user->id ?>" enctype="multipart/form-data">
                          <input type="file" name="user_image" onchange="readURL(this);" id="input-ava" class="d-none">
                          <?= csrf_field() ?>
                          <div class="mb-4">
                              <label for="name" class="form-label">Full Name</label>
                              <input type="text" class="form-control" name="name" id="name" value="<?= $user->full_name; ?>" />
                          </div>
                          <div class="mb-4">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" class="form-control" name="username" id="username" value="<?= $user->username; ?>" />
                          </div>
                          <div class="mb-4">
                              <label for="email" class="form-label">Email Address</label>
                              <input type="email" class="form-control border-0" name="email" id="email" disabled placeholder="<?= $user->email; ?>" />
                          </div>
                          <div class="mb-4">
                              <label for="bidang" class="form-label">Bidang</label>
                              <select name="bidang" class="form-select text-center " id="bidang">
                                  <?php if ($user->bidang) : ?>
                                      <option value="<?= $user->bid ?>"><?= $user->bidang ?></option>
                                  <?php endif; ?>
                                  <?php foreach ($bidang as $b) : ?>
                                      <option value="<?= $b['id'] ?>"><?= $b['nama'] ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="mb-4">
                              <label for="no_hp" class="form-label">Whatsapp Number</label>
                              <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $user->no_hp; ?>" />
                          </div>
                          <div class="d-grid gap-2">
                              <button class="btn btn-primary" type="submit">Save Profile</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <?= $this->endSection(); ?>

  <?= $this->section('scripts'); ?>
  <script>
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                  $('#ava-img')
                      .attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }

      let input = $('#input-ava');
      let btn = $('#btn-upload');

      btn.click(function() {
          input.click();
      })
  </script>
  <?= $this->endSection(); ?>