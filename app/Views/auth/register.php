<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content') ?>


<section class="login container">
    <div class="row">
        <div class="col-12 form-login">
            <h3><?= lang('Auth.register') ?></h3>

            <?= view('Myth\Auth\Views\_message_block') ?>
            <form action="<?= route_to('register') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-4">
                    <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" autofocus>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="exampleFormControlInput1" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                </div>
                <div class="mb-4">
                    <label for="bidang" class="form-label">Bidang</label>
                    <input type="text" name="bidang" class="form-control <?php if (session('errors.bidang')) : ?>is-invalid<?php endif ?>" id="bidang" placeholder="cth : KPI SDA" value="<?= old('bidang') ?>">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="pass_confirm" class="form-label"><?= lang('Auth.repeatPassword') ?></label>
                    <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="pass_confirm" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>">
                </div>

                <div class="d-grid gap-2 col-12 mt-5 mx-auto">
                    <button class="btn btn-primary py-2 btn-login" type="submit"><?= lang('Auth.register') ?></button>
                </div>
                <div class="text-center mt-3 text-white">
                    <p><?= lang('Auth.alreadyRegistered') ?> <a class="text-primary" href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                </div>
            </form>
        </div>

    </div>
    </div>
</section>

<?= $this->endSection(); ?>