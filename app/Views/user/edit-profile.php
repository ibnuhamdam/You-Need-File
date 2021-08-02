  <?= $this->extend('templates/index') ?>

  <?= $this->section('content') ?>

  <section class="edit-profile">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="circle-out">
                      <div class="circle">
                          <img src="<?= base_url() ?>/icon/person.svg" class="img-fluid mx-auto d-block" alt="" />
                      </div>
                      <div class="plus">
                          <img src="<?= base_url() ?>/icon/plus.svg" class="img-fluid mx-auto d-block" alt="" />
                      </div>
                  </div>
                  <div class="form-input">
                      <form method="POST" action="<?= base_url('user/update/') . '/' . $user->id ?>">
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
                              <input type="text" class="form-control" name="bidang" id="bidang" value="<?= $user->bidang; ?>" />
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