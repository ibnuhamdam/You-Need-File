<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content') ?>

<?= view('Myth\Auth\Views\_message_block') ?>

<section class="login container">
    <div class="row">
        <div class="col-12 form-login col-md-6 offset-md-3">
            <h3><?= lang('Auth.loginTitle') ?></h3>
            <form action="<?= base_url('login') ?>" method="post">
                <?= csrf_field() ?>
                <?php if ($config->validFields === ['email']) : ?>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label"><?= lang('Auth.email') ?></label>
                        <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="exampleFormControlInput1" name="login" placeholder="<?= lang('Auth.email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="mb-4">
                        <label for="email" class="form-label"><?= lang('Auth.emailOrUsername') ?></label>
                        <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="email" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="mb-4">
                    <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="<?= lang('Auth.password') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>
                <?php if ($config->allowRemembering) : ?>
                    <div class="form-check">
                        <label class="form-check-label" style="align-items: center;display:flex">
                            <input type="checkbox" name="remember" class="form-check-input mr-3" <?php if (old('remember')) : ?> checked <?php endif ?> style="padding: 11px 10px;height: 10px;margin-right: 10px;border-radius: 4px;">
                            <?= lang('Auth.rememberMe') ?>
                        </label>
                    </div>
                <?php endif; ?>
                <div class="d-grid gap-2 col-12 mt-5 mx-auto">
                    <button class="btn btn-primary py-2 btn-login" type="submit"><?= lang('Auth.loginAction') ?></button>
                </div>
            </form>
            <hr class="text-white mt-5">
            <?php if ($config->allowRegistration) : ?>
                <p><a class="text-white" href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
            <?php endif; ?>
            <?php if ($config->activeResetter) : ?>
                <p><a class="text-white" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
            <?php endif; ?>
        </div>
        <a href="home.html" style="text-decoration: none;">

        </a>

    </div>
    </div>
</section>

<?= $this->endSection(); ?>