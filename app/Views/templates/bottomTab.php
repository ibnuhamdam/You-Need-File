<nav class="navbar fixed-bottom shadow-nav navbar-light bg-body">
    <div class="container-fluid nav-bottom">
        <a href="<?= base_url('user') ?>" class="<?= ($bottom === 'file' ? 'active' : '') ?>">
            <li class="nav-item">
                <img src="<?= base_url(); ?>/icon/file<?= ($bottom === 'file' ? '-active' : '') ?>.svg" class="img-fluid mx-auto" alt="" />
                <p>File</p>
            </li>
        </a>
        <a href="<?= base_url('user/meet') ?>" class="<?= ($bottom === 'meet' ? 'active' : '') ?>">
            <li class="nav-item">
                <img src="<?= base_url(); ?>/icon/meeting<?= ($bottom === 'meet' ? '-active' : '') ?>.svg" class="img-fluid mx-auto" alt="" />
                <p>Meeting</p>
            </li>
        </a>
        <a href="<?= base_url('user/profile') . '/' . user()->id ?>" class="<?= ($bottom === 'profile' ? 'active' : '') ?>">
            <li class="nav-item">
                <img src="<?= base_url(); ?>/icon/profile<?= ($bottom === 'profile' ? '-active' : '') ?>.svg" class="img-fluid mx-auto" alt="" />
                <p>Profile</p>
            </li>
        </a>
    </div>
</nav>