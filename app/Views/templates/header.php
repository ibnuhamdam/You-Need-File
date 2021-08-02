<header class="nav fixed-top header px-3">
    <div class="container-fluid wrapper-header">
        <div class="title text-center py-4">
            <?php if ($header['type'] === 'no-arrow') : ?>
                <p><?= $header['title'] ?></p>
            <?php else : ?>
                <a href="<?= previous_url(); ?>">
                    <img src="<?= base_url(); ?>/icon/left-arrow.svg" class="img-fluid" alt="" />
                </a>
                <p><?= $header['title'] ?></p>
            <?php endif; ?>
        </div>
    </div>
</header>